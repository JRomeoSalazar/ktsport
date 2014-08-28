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

use Sylius\Bundle\CoreBundle\Model\Newsletter;
use Sylius\Bundle\CoreBundle\Services\NewsletterEmailManager;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Newsletter send listener.
 *
 * @author Jorge Romeo <jromeosalazar@gmail.com>
 */
class NewsletterSendListener
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
     * Recive la newsletter y envía el correo electrónico.
     *
     * @param GenericEvent $event
     *
     * @throws \InvalidArgumentException
     */
    public function sendEmail(GenericEvent $event)
    {
        $newsletter = $event->getSubject();

        if (!$newsletter instanceof Newsletter) {
            throw new \InvalidArgumentException(
                'User update listener requires event subject to be instance of "FOS\UserBundle\Model\UserInterface".'
            );
        }

        $this->emailManager->sendEmail($newsletter);
    }
}
