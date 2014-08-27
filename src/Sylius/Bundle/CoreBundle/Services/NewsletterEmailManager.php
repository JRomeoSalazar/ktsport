<?php

/*
* This file is part of the Sylius package.
*
* (c) Paweł Jędrzejewski
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Sylius\Bundle\CoreBundle\Services;

class NewsletterEmailManager
{
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * Constructor.
     *
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

	/**
	 * Enviar correo con la newsletter
	 *
	 * @param Newsletter $newsletter
	 */
	public function sendEmail($newsletter)
	{
		$destinatarios = $newsletter->getDestinatarios();

        $logo = $message->embed(\Swift_Image::fromPath('bundles/syliusweb/images/newsletter/logo.jpg'));
        $spacer = $message->embed(\Swift_Image::fromPath('bundles/syliusweb/images/newsletter/spacer.gif'));
        $facebook = $message->embed(\Swift_Image::fromPath('bundles/syliusweb/images/newsletter/facebook.png'));
        $linkedin = $message->embed(\Swift_Image::fromPath('bundles/syliusweb/images/newsletter/linkedin.png'));
        $twitter = $message->embed(\Swift_Image::fromPath('bundles/syliusweb/images/newsletter/twitter.png'));
        $youtube = $message->embed(\Swift_Image::fromPath('bundles/syliusweb/images/newsletter/youtube.png'));

		$message = \Swift_Message::newInstance()
	        ->setSubject( $newsletter->getTitulo() )
	        ->setFrom( $newsletter->getEmisor() )
	        ->setTo( $destinatarios[0] )
	        ->setBody(
	            $this->renderView(
	                'SyliusWebBundle:Backend/Newsletter/Template:newsletter.html.twig',
	                array(
	                	'logo' => $logo,
	                	'spacer' => $spacer,
	                	'facebook' => $facebook,
	                	'linkedin' => $linkedin,
	                	'twitter' => $twitter,
	                	'youtube' => $youtube
	                )
	            )
	        )
	    ;
	    $this->get('mailer')->send($message);
	}
}
