<?php

namespace Sylius\Bundle\CoreBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Bundle\AddressingBundle\Model\ProvinceInterface;

/**
 * NewsletterUser
 */
class NewsletterUser
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string $email
     */
    protected $email;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var integer $province
     */
    protected $province;

    /**
     * @var integer $province
     */
    protected $actividad;

    /**
     * String to be displayed
     */
    public function __toString()
    {
        if ($this->name === null) return $this->email;
        else return $this->name;
    }

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
     * Set the email.
     *
     * @param string $email
     * @return NewsletterUser
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the name.
     *
     * @param string $name
     * @return NewsletterUser
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the province.
     *
     * @param ProvinceInterface $province
     */
    public function setProvince(ProvinceInterface $province = null)
    {
        $this->province = $province;
    }

    /**
     * Get province.
     *
     * @return ProvinceInterface
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set the actividad.
     *
     * @param Actividad $actividad
     */
    public function setActividad(Actividad $actividad = null)
    {
        $this->actividad = $actividad;
    }

    /**
     * Get actividad.
     *
     * @return Actividad
     */
    public function getActividad()
    {
        return $this->actividad;
    }
}
