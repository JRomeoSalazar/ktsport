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

/**
 * Order descuento processor.
 * Service implementing this service should apply descuentos to given order.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
interface DescuentoProcessorInterface
{
    /**
     * Apply descuentos to given order.
     *
     * @param OrderInterface $order
     */
    public function applyDescuentos(OrderInterface $order);
}
