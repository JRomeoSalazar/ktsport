<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\CoreBundle\EventListener;

use Doctrine\ORM\EntityManager;
use Sylius\Bundle\CoreBundle\Model\ShipmentInterface;
use Sylius\Bundle\CoreBundle\OrderProcessing\StateResolverInterface;
use Sylius\Bundle\ResourceBundle\Model\RepositoryInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Order inventory processing listener.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class ShipmentStateListener
{
    /**
     * States resolver.
     *
     * @var StateResolverInterface
     */
    protected $stateResolver;

    /**
     * Order repository.
     *
     * @var RepositoryInterface
     */
    protected $orderRepository;

    /**
     * Doctrine Entity Manager.
     *
     * @var EntityManager
     */
    protected $em;

    /**
     * Constructor.
     *
     * @param StateResolverInterface $stateResolver
     */
    public function __construct(StateResolverInterface $stateResolver, RepositoryInterface $orderRepository, EntityManager $em)
    {
        $this->stateResolver = $stateResolver;
        $this->orderRepository = $orderRepository;
        $this->em = $em;
    }

    /**
     * Get the shipment from event, get its order and resolve shipment state.
     *
     * @param GenericEvent $event
     *
     * @throws \InvalidArgumentException
     */
    public function resolveShipmentState(GenericEvent $event)
    {
        $shipment = $event->getSubject();

        if (!$shipment instanceof ShipmentInterface) {
            throw new \InvalidArgumentException(
                'Shipment state listener requires event subject to be an instance of "Sylius\Bundle\CoreBundle\Model\ShipmentInterface"'
            );
        }

        $order = $shipment->getOrder();

        $this->stateResolver->resolveShippingState($order);

        $this->em->persist($order);
        $this->em->flush();
    }
}
