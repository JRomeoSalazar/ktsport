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

use Sylius\Bundle\ResourceBundle\Model\RepositoryInterface;
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
     * Newsletter user repository.
     *
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * Constructor.
     *
     * @param \Swift_Mailer			$mailer
     * @param EngineInterface		$templating
     * @param RepositoryInterface	$repository
     */
    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating, RepositoryInterface $repository)
    {
        $this->mailer 					= $mailer;
        $this->templating 				= $templating;
        $this->repository 				= $repository;
    }

	/**
	 * Enviar correo con la newsletter
	 *
	 * @param Newsletter $newsletter
	 */
	public function sendEmail($newsletter)
	{
		// Si elegimos la opción 'Enviar a todos'
		if ($newsletter->getEnviarATodos()) {
			$destinatarios = $this->repository->findAll();
		}

		// Si enviamos el correo por provincias o actividades
		else {
			$provinces = array();
			foreach ($newsletter->getProvinces() as $province) {
				$provinces[] = $province->getId();
			}

			$actividades = array();
			foreach ($newsletter->getActividades() as $actividad) {
				$actividades[] = $actividad->getId();
			}
			
			$criteria = array(
				'provinces' => $provinces,
				'actividades' => $actividades
			);

			$destinatarios = $this->repository->filterByCriteria($criteria);
		}

		// Una vez tenemos los destinatarios
	    foreach ($destinatarios as $destinatario) {
			$message = \Swift_Message::newInstance();

			$message->setSubject($newsletter->getTitulo());

		    if ($newsletter->getNombreEmisor() != null) {
		        $message->setFrom( array($newsletter->getEmisor() => $newsletter->getNombreEmisor()) );
		    }
		    else {
		    	$message->setFrom( $newsletter->getEmisor() );
		    }
		    
		    $message
		    	->setTo($destinatario->getEmail())
		        ->setBody(
		            $this->templating->render(
		                'SyliusWebBundle:Backend/Newsletter/Template:newsletter.html.twig',
		                array(
		                	'titulo' => $newsletter->getTitulo(),
		                	'contenido' => $newsletter->getContenido(),
		                	'mes' => $newsletter->getMes(),
		                	'id' => $destinatario->getId()
		                )
		            ),
	            	'text/html'
		        )
		    ;

		    $this->mailer->send($message);
		}
	}
}
