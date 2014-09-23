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

use Sylius\Bundle\CoreBundle\Model\NewsletterUser;
use Sylius\Bundle\CoreBundle\Services\NewsletterEmailManager;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Newsletter send listener.
 *
 * @author Jorge Romeo <jromeosalazar@gmail.com>
 */
class NewsletterUserConfirmListener
{
    /**
     * Newsletter Email Manager.
     *
     * @var NewsletterEmailManager
     */
    protected $emailManager;

    /**
     * Constructor.
     *
     * @param NewsletterEmailManager $emailManager
     */
    public function __construct(NewsletterEmailManager $emailManager)
    {
        $this->emailManager = $emailManager;
    }

    /**
     * Recive el usuario de newsletter y envía el correo de confirmación de registro.
     *
     * @param GenericEvent $event
     *
     * @throws \InvalidArgumentException
     */
    public function confirmEmail(GenericEvent $event)
    {
        $newsletterUser = $event->getSubject();

        if (!$newsletterUser instanceof NewsletterUser) {
            throw new \InvalidArgumentException(
                'Newsletter confirm listener requires event subject to be instance of "Sylius\Bundle\CoreBundle\Model\NewsletterUser".'
            );
        }

        $this->emailManager->confirmEmail($newsletterUser);
    }
}
