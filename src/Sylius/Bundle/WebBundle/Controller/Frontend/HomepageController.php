<?php

namespace Sylius\Bundle\WebBundle\Controller\Frontend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    /***************************/
    /******* NEWSLETTER ********/
    public function unsubscribeAction($id)
    {
        $newsletterUser = $this->get('sylius.repository.newsletter_user')->find($id);
        return $this->render('SyliusWebBundle:Frontend/Homepage/Newsletter:unsubscribe.html.twig', array('newsletterUser' => $newsletterUser));
    }

    public function deleteNewsletterUserAction($id)
    {
        if (!$id) throw $this->createNotFoundException('Debes introducir un id válido.');
        
        $user = $this->get('sylius.repository.newsletter_user')->find($id);

        if ($user === null) throw $this->createNotFoundException('Usuario de newsletter no encontrado');

        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->render('SyliusWebBundle:Frontend/Homepage/Newsletter:unsubscribeConfirmed.html.twig');
    }

    /***************************/
    /********** SITE ***********/
    public function indexAction()
    {
        $slider_images = $this->get('ktsport.repository.button')->findByBar(7);
        $index_images = $this->get('ktsport.repository.button')->findByBar(8);
        return $this->render('SyliusWebBundle:Frontend/Homepage:index.html.twig', array('url' => 'ktsport_index', 'slider_images' => $slider_images, 'index_images' => $index_images));
    }

    public function instructionsAction()
    {
        $buttons = $this->get('ktsport.repository.button')->findByBar(2);
        return $this->render('SyliusWebBundle:Frontend/Homepage:instructions.html.twig', array('buttons' => $buttons, 'url' => 'ktsport_instructions'));
    }

    public function productsAction($section)
    {
        if ( $section == 'faq' ) {
            $url = 'kt_sport_web_faq';
        }
        else {
            $url = 'ktsport_products';
        }
        $kt = "pro";
        $buttons = $this->get('ktsport.repository.button')->findByBar(3);
        return $this->render('SyliusWebBundle:Frontend/Homepage:products.html.twig', array(
            'buttons' => $buttons,
            'url' => $url,
            'section' => $section,
            'kt' => $kt
        ));
    }

    public function originalAction($section)
    {
        if ( $section == 'faq' ) {
            $url = 'kt_sport_web_faq';
        }
        else {
            $url = 'ktsport_original';
        }
        $kt = "original";
        $buttons = $this->get('ktsport.repository.button')->findByBar(9);
        return $this->render('SyliusWebBundle:Frontend/Homepage:products.html.twig', array(
            'buttons' => $buttons,
            'url' => $url,
            'section' => $section,
            'kt' => $kt
        ));
    }

    public function what_is_kt_tapeAction()
    {
        $buttons = $this->get('ktsport.repository.button')->findByBar(4);
        return $this->render('SyliusWebBundle:Frontend/Homepage:what_is_kt_tape.html.twig', array('buttons' => $buttons, 'url' => 'ktsport_what_is_kt_tape'));
    }

    public function wheretobuyAction()
    {
        $dealers = $this->get('ktsport.repository.dealer')->findDealers();
        //$spain = $this->get('ktsport.repository.dealer')->find(9);
        return $this->render('SyliusWebBundle:Frontend/Homepage:where_to_buy.html.twig', array('dealers' => $dealers, 'url' => 'ktsport_where_to_buy'));
    }

    public function clinicalAction()
    {
        $profesionales = $this->get('ktsport.repository.button')->findByBar(5);
        return $this->render('SyliusWebBundle:Frontend/Homepage:clinical.html.twig', array('profesionales' => $profesionales, 'url' => 'ktsport_clinical'));
    }

    public function eventsAction()
    {
        //$events = $this->get('ktsport.repository.event')->findBy( array(), array('date' => 'desc') );
        $events = $this->get('ktsport.repository.event')->findAllOrderedByDate();
        $button = $this->get('ktsport.repository.button')->find(24);
        return $this->render('SyliusWebBundle:Frontend/Homepage:events.html.twig', array('events' => $events, 'button' => $button, 'url' => 'ktsport_events'));
    }

    public function videosAction($id)
    {
        if (!$id)
        {
            throw $this->createNotFoundException('Debes introducir un id válido.');
        }

        if ( $id == 10000 ) {
            $rep = 'ktsport.repository.button';
            $id = 9;
        }
        else {
            $rep = 'ktsport.repository.subbutton';
        }
        $instruction = $this->get($rep)->find($id);
        return $this->render('SyliusWebBundle:Frontend/Homepage:videos.html.twig', array(
                'instruction' => $instruction,
                'url' => 'ktsport_videos',
                'id' => $id
            )
        );
    }

    public function dealersAction()
    {
        $button = $this->get('ktsport.repository.button')->find(39);
        return $this->render('SyliusWebBundle:Frontend/Homepage:dealers.html.twig', array('button' => $button, 'url' => 'ktsport_dealers'));
    }

    public function contactAction()
    {
        $contact = $this->get('ktsport.repository.button')->find(40);
        return $this->render('SyliusWebBundle:Frontend/Homepage:contact.html.twig', array('contact' => $contact, 'url' => 'ktsport_contact'));
    }

    public function aboutusAction()
    {
        $aboutus = $this->get('ktsport.repository.button')->find(41);
        return $this->render('SyliusWebBundle:Frontend/Homepage:aboutus.html.twig', array('aboutus' => $aboutus, 'url' => 'ktsport_aboutus'));
    }

    public function pdfAction()
    {
        $buttons = $this->get('ktsport.repository.button')->findByBar(2);
        return $this->render('SyliusWebBundle:Frontend/Homepage:pdf.html.twig', array('buttons' => $buttons, 'url' => 'ktsport_pdf'));
    }

    public function subbuttonsAction($button, $tag)
    {
        $subbuttons = $this->get('ktsport.repository.subbutton')->findByButton($button);
        return $this->render('SyliusWebBundle:Frontend/Homepage:subbutton.html.twig', array('subbuttons' => $subbuttons, 'tag' => $tag));
    }

    public function headerAction($url, $route_params)
    {
		$buttons = $this->get('ktsport.repository.button')->buttonsNavegacion();
            return $this->render('SyliusWebBundle:Frontend/Homepage:header.html.twig', array('buttons' => $buttons, 'url' => $url, 'route_params' => $route_params));
    }

    public function bottombarAction()
    {
        $buttons = $this->get('ktsport.repository.button')->findByBar(1);
        return $this->render('SyliusWebBundle:Frontend/Homepage:bottombar.html.twig', array('buttons' => $buttons));
    }
}
