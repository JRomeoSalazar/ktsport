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

use Symfony\Component\Templating\EngineInterface;

class NewsletterEmailManager
{
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @var EngineInterface
     */
    protected $templating;

    /**
     * Constructor.
     *
     * @param \Swift_Mailer		$mailer
     * @param EngineInterface	$templating
     */
    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating)
    {
        $this->mailer 		= $mailer;
        $this->templating 	= $templating;
    }

	/**
	 * Enviar correo con la newsletter
	 *
	 * @param Newsletter $newsletter
	 */
	public function sendEmail($newsletter)
	{
		$destinatarios = $newsletter->getDestinatarios();

		$message = \Swift_Message::newInstance();

        $logo = $message->embed(\Swift_Image::fromPath('bundles/syliusweb/images/newsletter/logo.jpg'));
        $spacer = $message->embed(\Swift_Image::fromPath('bundles/syliusweb/images/newsletter/spacer.gif'));
        $facebook = $message->embed(\Swift_Image::fromPath('bundles/syliusweb/images/newsletter/facebook.png'));
        $linkedin = $message->embed(\Swift_Image::fromPath('bundles/syliusweb/images/newsletter/linkedin.png'));
        $twitter = $message->embed(\Swift_Image::fromPath('bundles/syliusweb/images/newsletter/twitter.png'));
        $youtube = $message->embed(\Swift_Image::fromPath('bundles/syliusweb/images/newsletter/youtube.png'));

		$message
	        ->setSubject( $newsletter->getTitulo() )
	        ->setFrom( $newsletter->getEmisor() )
	        ->setTo( $destinatarios[0] )
	        ->setBody(
	            $this->templating->render(
	                'SyliusWebBundle:Backend/Newsletter/Template:newsletter.html.twig',
	                array(
	                	'logo' => $logo,
	                	'spacer' => $spacer,
	                	'facebook' => $facebook,
	                	'linkedin' => $linkedin,
	                	'twitter' => $twitter,
	                	'youtube' => $youtube,
	                	'titulo' => $newsletter->getTitulo(),
	                	'contenido' => $newsletter->getContenido()
	                )
	            )
	        )
	    ;

	    $this->mailer->send($message);
	}
}
