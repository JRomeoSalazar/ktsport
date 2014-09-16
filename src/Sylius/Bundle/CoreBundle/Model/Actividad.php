<?php

namespace Sylius\Bundle\CoreBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Actividad
 */
class Actividad
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string $name
     */
    protected $name;

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

    /**
     * Model To String
     */
    public function __toString()
    {
        return $this->name;
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
     * Set newsletters.
     *
     * @param Collection $newsletters
     * @return NewsletterUser
     */
    public function setNewsletters($newsletters)
    {
        $this->newsletters = $newsletters;
    }

    /**
     * Get newsletters.
     *
     * @return Collection
     */
    public function getNewsletters()
    {
        return $this->newsletters;
    }

    /**
     * Get newsletterUsers.
     *
     * @return Collection
     */
    public function getNewsletterUsers()
    {
        return $this->newsletterUsers;
    }

    /**
     * Checks if province has newsletterUser.
     *
     * @return Boolean
     */
    public function hasNewsletterUser(NewsletterUser $newsletterUser)
    {
        return $this->newsletterUsers->contains($newsletterUser);
    }

    /**
     * Add newsletterUser.
     *
     * @param NewsletterUser $newsletterUser
     */
    public function addNewsletterUser(NewsletterUser $newsletterUser)
    {
        if (!$this->hasNewsletterUser($newsletterUser)) {
            $newsletterUser->setProvince($this);
            $this->newsletterUsers->add($newsletterUser);
        }
    }

    /**
     * Remove newsletterUser.
     *
     * @param NewsletterUser $newsletterUser
     */
    public function removeNewsletterUser(NewsletterUser $newsletterUser)
    {
        $newsletterUser->setProvince(null);
        $this->newsletterUsers->removeElement($newsletterUser);
    }
}
