<?php

namespace Sylius\Bundle\WebBundle\Twig;

use Symfony\Component\Security\Core\SecurityContext;
use Sylius\Bundle\ResourceBundle\Model\RepositoryInterface;

class DescuentoExtension extends \Twig_Extension
{
    /**
     * Security context
     *
     * @var SecurityContext
     */
    protected $security;

    /**
     * Product repository
     *
     * @var RepositoryInterface
     */
    protected $productRepository;

    /**
     * Variant repository
     *
     * @var RepositoryInterface
     */
    protected $variantRepository;

    /**
     * Constructor.
     *
     * @param SecurityContext           $security
     * @param RepositoryInterface       $productRepository
     * @param RepositoryInterface       $variantRepository
     */
    public function __construct(SecurityContext $security, RepositoryInterface $productRepository, RepositoryInterface $variantRepository)
    {
        $this->security = $security;
        $this->productRepository = $productRepository;
        $this->variantRepository = $variantRepository;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('descuento', array($this, 'descuentoFilter')),
        );
    }

    public function descuentoFilter($amount, $itemId, $item = "product")
    {
        if (!$this->security->isGranted('ROLE_USER')) {
            return $amount;
        }
        
        $item == "product" ? $producto = $this->productRepository->find($itemId) : $producto = $this->variantRepository->find($itemId)->getProduct();
        if (!isset($producto)) {
            return $amount;
        }

        $descuentos = $producto->getDescuentos();

        $user = $this->security->getToken()->getUser();

        foreach ($descuentos as $descuento) {
            if ($user->hasGroup($descuento->getGroup()->getName())) {
                return $amount-($amount*$descuento->getPorcentaje()/100);
            }
        }

        return $amount;
    }

    public function getName()
    {
        return 'descuento_extension';
    }
}