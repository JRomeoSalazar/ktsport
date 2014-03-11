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

use Sylius\Bundle\CoreBundle\Model\OrderInterface;
use Sylius\Bundle\CoreBundle\OrderProcessing\DescuentoProcessorInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Order descuento listener.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class OrderDescuentoListener
{
    /**
     * Order descuento processor.
     *
     * @var DescuentoProcessorInterface
     */
    protected $descuentoProcessor;

    /**
     * Constructor.
     *
     * @param DescuentoProcessorInterface $descuentoProcessor
     */
    public function __construct(DescuentoProcessorInterface $descuentoProcessor)
    {
        $this->descuentoProcessor = $descuentoProcessor;
    }

    /**
     * Get the order from event and run the descuento processor on it.
     *
     * @param GenericEvent $event
     */
    public function applyDescuentos(GenericEvent $event)
    {
        $order = $event->getSubject();

        if (!$order instanceof OrderInterface) {
            throw new \InvalidArgumentException(
                'Order descuento listener requires event subject to be instance of "Sylius\Bundle\CoreBundle\Model\OrderInterface"'
            );
        }

        $this->descuentoProcessor->applyDescuentos($order);

        $order->calculateTotal();
    }
}
