<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\CoreBundle\Model;

use Doctrine\Common\Collections\Collection;
use Sylius\Bundle\AddressingBundle\Model\AddressInterface;
use Sylius\Bundle\CartBundle\Model\CartInterface;
use Sylius\Bundle\PromotionsBundle\Model\CouponInterface;
use Sylius\Bundle\PromotionsBundle\Model\PromotionSubjectInterface;
use Sylius\Bundle\PaymentsBundle\Model\PaymentInterface;

/**
 * Sylius core Order model.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
interface OrderInterface extends CartInterface, PromotionSubjectInterface
{
    // Labels for tax, shipping and promotion adjustments.
    const TAX_ADJUSTMENT       = 'tax';
    const SHIPPING_ADJUSTMENT  = 'shipping';
    const PROMOTION_ADJUSTMENT = 'promotion';
    const DESCUENTO_ADJUSTMENT = 'descuento';

    /**
     * Get user.
     *
     * @return UserInterface
     */
    public function getUser();

    /**
     * Set user.
     *
     * @param UserInterface $user
     */
    public function setUser(UserInterface $user);

    /**
     * Get shipping address.
     *
     * @return AddressInterface
     */
    public function getShippingAddress();

    /**
     * Set shipping address.
     *
     * @param AddressInterface $address
     */
    public function setShippingAddress(AddressInterface $address);

    /**
     * Get billing address.
     *
     * @return AddressInterface
     */
    public function getBillingAddress();

    /**
     * Set billing address.
     *
     * @param AddressInterface $address
     */
    public function setBillingAddress(AddressInterface $address);

    /**
     * Get the tax total.
     *
     * @return float
     */
    public function getTaxTotal();

    /**
     * Get the descuento total.
     *
     * @return float
     */
    public function getDescuentoTotal();

    /**
     * Get all tax adjustments.
     *
     * @return Collection
     */
    public function getTaxAdjustments();

    /**
     * Get all descuento adjustments.
     *
     * @return Collection
     */
    public function getDescuentoAdjustments();

    /**
     * Remove all tax adjustments.
     */
    public function removeTaxAdjustments();

    /**
     * Remove all descuento adjustments.
     */
    public function removeDescuentoAdjustments();

    /**
     * Get the promotion total.
     *
     * @return float
     */
    public function getPromotionTotal();

    /**
     * Get all promotion adjustments.
     *
     * @return Collection
     */
    public function getPromotionAdjustments();

    /**
     * Remove all promotion adjustments.
     */
    public function removePromotionAdjustments();

    /**
     * Get shipping total.
     *
     * @return float
     */
    public function getShippingTotal();

    /**
     * Get all shipping adjustments.
     *
     * @return Collection
     */
    public function getShippingAdjustments();

    /**
     * Remove all shipping adjustments.
     */
    public function removeShippingAdjustments();

    /**
     * Get the payment associated with the order.
     *
     * @return PaymentInterface
     */
    public function getPayment();

    /**
     * Set payment.
     *
     * @param PaymentInterface $payment
     */
    public function setPayment(PaymentInterface $payment);

    /**
     * Get the payment state.
     *
     * @return string
     */
    public function getPaymentState();

    /**
     * Get all inventory units.
     *
     * @return InventoryUnitInterface[]
     */
    public function getInventoryUnits();

    /**
     * Get all inventory units by the product variant.
     *
     * @param VariantInterface $variant
     *
     * @return InventoryUnitInterface[]
     */
    public function getInventoryUnitsByVariant(VariantInterface $variant);

    /**
     * Add inventory unit.
     *
     * @param InventoryUnitInterface $unit
     */
    public function addInventoryUnit(InventoryUnitInterface $unit);

    /**
     * Remove inventory unit.
     *
     * @param InventoryUnitInterface $unit
     */
    public function removeInventoryUnit(InventoryUnitInterface $unit);

    /**
     * Has inventory unit?
     *
     * @param InventoryUnitInterface $unit
     *
     * @return Boolean
     */
    public function hasInventoryUnit(InventoryUnitInterface $unit);

    /**
     * Get all shipments associated with this order.
     *
     * @return ShipmentInterface[]
     */
    public function getShipments();

    /**
     * Check if order has any shipments.
     *
     * @return Boolean
     */
    public function hasShipments();

    /**
     * Add a shipment.
     *
     * @param ShipmentInterface $shipment
     */
    public function addShipment(ShipmentInterface $shipment);

    /**
     * Remove shipment.
     *
     * @param ShipmentInterface $shipment
     */
    public function removeShipment(ShipmentInterface $shipment);

    /**
     * Has shipment?
     *
     * @param ShipmentInterface $shipment
     *
     * @return Boolean
     */
    public function hasShipment(ShipmentInterface $shipment);

    /**
     * Get currency.
     *
     * @return string
     */
    public function getCurrency();

    /**
     * Set currency.
     *
     * @param string
     *
     * @return OrderInterface
     */
    public function setCurrency($currency);

    /**
     * Set promotion coupon.
     *
     * @param CouponInterface $coupon
     */
    public function setPromotionCoupon(CouponInterface $coupon = null);

    /**
     * Get the shipping state.
     *
     * @return string
     */
    public function getShippingState();

    /**
     * Set shipping state.
     *
     * @param string $state
     */
    public function setShippingState($state);

    /**
     * Get comentario.
     *
     * @return string
     */
    public function getComentario();

    /**
     * Set comentario.
     *
     * @param string $comentario
     * @return OrderInterface
     */
    public function setComentario($comentario);

    /**
     * Has any pending inventory?
     *
     * @return Boolean
     */
    public function isBackorder();
}
