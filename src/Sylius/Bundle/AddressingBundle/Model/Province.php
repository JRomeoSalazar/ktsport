<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\AddressingBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Bundle\CoreBundle\Model\NewsletterUser;

/**
 * Default province model.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@sylius.pl>
 */
class Province implements ProvinceInterface
{
    /**
     * Province id.
     *
     * @var mixed
     */
    protected $id;

    /**
     * Name.
     *
     * @var string
     */
    protected $name;

    /**
     * Country.
     *
     * @var CountryInterface
     */
    protected $country;

    /**
     * @var Collection
     */
    protected $newsletters;

    /**
     * @var Collection
     */
    protected $newsletterUsers;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->newsletters = new ArrayCollection();
        $this->newsletterUsers = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountry(CountryInterface $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getNewsletters()
    {
        return $this->newsletters;
    }

    /**
     * {@inheritdoc}
     */
    public function setNewsletters($newsletters)
    {
        $this->newsletters = $newsletters;
    }

    /**
     * {@inheritdoc}
     */
    public function getNewsletterUsers()
    {
        return $this->newsletterUsers;
    }

    /**
     * {@inheritdoc}
     */
    public function hasNewsletterUser(NewsletterUser $newsletterUser)
    {
        return $this->newsletterUsers->contains($newsletterUser);
    }

    /**
     * {@inheritdoc}
     */
    public function addNewsletterUser(NewsletterUser $newsletterUser)
    {
        if (!$this->hasNewsletterUser($newsletterUser)) {
            $newsletterUser->setProvince($this);
            $this->newsletterUsers->add($newsletterUser);
        }
    }

     /**
     * {@inheritdoc}
     */
    public function removeNewsletterUser(NewsletterUser $newsletterUser)
    {
        $newsletterUser->setProvince(null);
        $this->newsletterUsers->removeElement($newsletterUser);
    }
}
