<?php

namespace Sylius\Bundle\CoreBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Descuento
 */
class Descuento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer $product
     */
    protected $product;

    /**
     * @var integer $group
     */
    protected $group;

    /**
     * @var integer
     */
    private $porcentaje;

    /**
     * @var \DateTime
     */
    private $empiezaEl;

    /**
     * @var \DateTime
     */
    private $terminaEl;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the product.
     *
     * @param Product $product
     */
    public function setProduct(Product $product = null)
    {
        $this->product = $product;
    }

    /**
     * Get product.
     *
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set the group.
     *
     * @param Group $group
     */
    public function setGroup(Group $group = null)
    {
        $this->group = $group;
    }

    /**
     * Get group.
     *
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set porcentaje
     *
     * @param integer $porcentaje
     * @return Descuento
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;
    
        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return integer 
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Set empiezaEl
     *
     * @param \DateTime $empiezaEl
     * @return Descuento
     */
    public function setEmpiezaEl($empiezaEl)
    {
        $this->empiezaEl = $empiezaEl;
    
        return $this;
    }

    /**
     * Get empiezaEl
     *
     * @return \DateTime 
     */
    public function getEmpiezaEl()
    {
        return $this->empiezaEl;
    }

    /**
     * Set terminaEl
     *
     * @param \DateTime $terminaEl
     * @return Descuento
     */
    public function setTerminaEl($terminaEl)
    {
        $this->terminaEl = $terminaEl;
    
        return $this;
    }

    /**
     * Get terminaEl
     *
     * @return \DateTime 
     */
    public function getTerminaEl()
    {
        return $this->terminaEl;
    }
}
