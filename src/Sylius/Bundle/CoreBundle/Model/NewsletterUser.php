<?php

namespace Sylius\Bundle\CoreBundle\Model;

use Doctrine\ORM\Mapping as ORM;

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
}
