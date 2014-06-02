<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\CoreBundle\Controller;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * SubButton controller.
 *
 * @author Jorge Romeo <jromeosalazar@gmail.com>
 */
class SubButtonController extends ResourceController
{
    /**
     * Render sub button filter form.
     *
     * @param Request $request
     */
    public function filterFormAction(Request $request)
    {
        return $this->renderResponse('SyliusWebBundle:Backend/SubButton:filterForm.html.twig', array(
            'form' => $this->get('form.factory')->createNamed('criteria', 'sylius_subbutton_filter', $request->query->get('criteria'))->createView()
        ));
    }
}
