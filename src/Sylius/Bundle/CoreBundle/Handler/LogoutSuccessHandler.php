<?php
// src/Sylius/Bundle/ForumBundle/Handler/LogoutSuccessHandler.php

namespace Sylius\Bundle\CoreBundle\Handler;

use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

/**
 * Custom logout handler
 */
class LogoutSuccessHandler implements LogoutSuccessHandlerInterface
{

	/**
	 * @var \Symfony\Component\DependencyInjection\ContainerInterface
	 */
	private $container;

	/**
	 * @var \Symfony\Bundle\FrameworkBundle\Routing\Router
	 */
	protected $router;

	/**
	 * Constructor
	 *
	 * @param ContainerInterface	$container
	 * @param Router 				$router
	 */
	public function __construct(ContainerInterface $container, Router $router)
	{
		$this->container =	$container;
		$this->router =		$router;
	}
    
    public function onLogoutSuccess(Request $request)
    {
		// redirect the user to shop homepage.
        $response = new RedirectResponse($this->router->generate('sylius_homepage'));
             
        return $response;
    }
}