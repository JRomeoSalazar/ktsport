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

use Doctrine\Common\Collections\Collection;
use Sylius\Bundle\CoreBundle\Model\NewsletterUser;

/**
 * Province interface.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@sylius.pl>
 */
interface ProvinceInterface
{
    public function getId();
    public function getName();
    public function setName($name);
    public function getCountry();
    public function setCountry(CountryInterface $country = null);

    /**
     * Get newsletters.
     *
     * @return Collection
     */
    public function getNewsletters();

    /**
     * Set newsletters.
     *
     * @param Collection $newsletters
     * @return NewsletterUser
     */
    public function setNewsletters($newsletters);

    /**
     * Get newsletterUsers.
     *
     * @return Collection
     */
    public function getNewsletterUsers();

    /**
     * Checks if province has newsletterUser.
     *
     * @return Boolean
     */
    public function hasNewsletterUser(NewsletterUser $newsletterUser);

    /**
     * Add newsletterUser.
     *
     * @param NewsletterUser $newsletterUser
     */
    public function addNewsletterUser(NewsletterUser $newsletterUser);

    /**
     * Remove newsletterUser.
     *
     * @param NewsletterUser $newsletterUser
     */
    public function removeNewsletterUser(NewsletterUser $newsletterUser);
}
