<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\CoreBundle\OrderProcessing;

use Sylius\Bundle\CoreBundle\Model\OrderInterface;
use Sylius\Bundle\ResourceBundle\Model\RepositoryInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Sylius\Bundle\AddressingBundle\Matcher\ZoneMatcherInterface;
use Sylius\Bundle\SettingsBundle\Model\Settings;
use Sylius\Bundle\TaxationBundle\Calculator\CalculatorInterface;
use Sylius\Bundle\TaxationBundle\Resolver\TaxRateResolverInterface;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Taxation processor.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class DescuentoProcessor implements DescuentoProcessorInterface
{
    /**
     * Adjustment repository.
     *
     * @var RepositoryInterface
     */
    protected $adjustmentRepository;

    /**
     * Security context
     *
     * @var SecurityContext
     */
    protected $security;

    /**
     * Constructor.
     *
     * @param RepositoryInterface      $adjustmentRepository
     * @param SecurityContext          $security
     * @param CalculatorInterface      $calculator
     * @param TaxRateResolverInterface $taxRateResolver
     * @param ZoneMatcherInterface     $zoneMatcher
     * @param Settings                 $taxationSettings
     */
    public function __construct(
        RepositoryInterface $adjustmentRepository,
        SecurityContext $security,
        CalculatorInterface $calculator,
        TaxRateResolverInterface $taxRateResolver,
        ZoneMatcherInterface $zoneMatcher,
        Settings $taxationSettings
    )
    {
        $this->adjustmentRepository = $adjustmentRepository;
        $this->security = $security;
        $this->calculator = $calculator;
        $this->taxRateResolver = $taxRateResolver;
        $this->zoneMatcher = $zoneMatcher;
        $this->settings = $taxationSettings;
    }

    /**
     * {@inheritdoc}
     */
    public function applyDescuentos(OrderInterface $order)
    {
        /* Elimina todos los ajustes de descuento para empezar desde cero */
        $order->removeDescuentoAdjustments();

        /* Si el pedido no tiene ningún item salimos */
        if (0 === count($order->getItems())) {
            return;
        }

        /* Averiguamos la zona fiscal del pedido */
        $zone = null;

        if (null !== $order->getShippingAddress()) {
            $zone = $this->zoneMatcher->match($order->getShippingAddress()); // Match the tax zone.
        }

        if ($this->settings->has('default_tax_zone')) {
            $zone = $zone ?: $this->settings->get('default_tax_zone'); // If address does not match any zone, use the default one.
        }

        if (null === $zone) {
            return;
        }

        $descuentos = array();

        foreach ($order->getItems() as $item) {
            /* Obtenemos el producto */
            $product = $item->getProduct();

            /* Obtenemos el impuesto que corresponde al producto */
            $rate = $this->taxRateResolver->resolve($product, array('zone' => $zone));

            /* Aplicamos los ajustes al item */
            $item->calculateTotal();

            /* Descuentos del producto */
            $descs = $product->getDescuentos();

            /* Obtenemos el usuario */
            $user = $this->security->getToken()->getUser();

            /* Iteramos por los descuentos para saber cuál le corresponde */
            $finalDesc = null;
            
            foreach ($descs as $desc) {
                if ($user->hasGroup($desc->getGroup()->getName())) {
                    $finalDesc = $desc;
                }
            }

            if (null !== $finalDesc) {
                /* Precio del item una vez hecho el descuento */
                $descuentoAmount = $item->getTotal()*$finalDesc->getPorcentaje()/100;
                $descuentoTaxAmount = $this->calculator->calculate($descuentoAmount, $rate);
                $descuentoFinalAmount = $descuentoAmount + $descuentoTaxAmount;

                $description = sprintf('%s (%d%%)', $finalDesc->getGroup()->getName(), $finalDesc->getPorcentaje());

                $descuentos[$description] = array(
                    'amount'   => (isset($descuentos[$description]['amount']) ? $descuentos[$description]['amount'] : 0) + $descuentoFinalAmount
                );
            }
        }

        foreach ($descuentos as $description => $descuento) {

            // Obtenemos la cantidad a descontar
            $amount = $descuento['amount'];
            $amount *= -1;

            $adjustment = $this->adjustmentRepository->createNew();

            $adjustment->setLabel(OrderInterface::DESCUENTO_ADJUSTMENT);
            $adjustment->setAmount($amount);
            $adjustment->setDescription($description);

            $order->addAdjustment($adjustment);
        }

        $order->calculateTotal();
    }
}
