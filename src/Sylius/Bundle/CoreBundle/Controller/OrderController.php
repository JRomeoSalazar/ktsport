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
use Sylius\Bundle\PaymentsBundle\Model\PaymentInterface;
use Sylius\Bundle\CoreBundle\OrderProcessing\StateResolver;

class OrderController extends ResourceController
{
    /**
     * Render order filter form.
     */
    public function filterFormAction(Request $request)
    {
        $form = $this->getFormFactory()->createNamed('criteria', 'sylius_order_filter', $request->query->get('criteria'));

        return $this->renderResponse('SyliusWebBundle:Backend/Order:filterForm.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function indexByUserAction(Request $request, $id)
    {
        $config = $this->getConfiguration();
        $sorting = $config->getSorting();

        $user = $this->get('sylius.repository.user')
            ->findOneById($id);

        if (!isset($user)) {
            throw new NotFoundHttpException('Requested user does not exist');
        }

        $paginator = $this
            ->getRepository()
            ->createByUserPaginator($user, $sorting);

        $paginator->setCurrentPage($request->get('page', 1), true, true);
        $paginator->setMaxPerPage($config->getPaginationMaxPerPage());

        return $this->renderResponse('SyliusWebBundle:Backend/Order:indexByUser.html.twig', array(
            'user' => $user,
            'orders' => $paginator
        ));
    }

    private function getFormFactory()
    {
        return $this->get('form.factory');
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function finalizePaymentAction($id)
    {
        /* Obtenemos la order */
        $order = $this->get('sylius.repository.order')->findOneById($id);
        if (!isset($order)) {
            throw new NotFoundHttpException('La orden requerida no existe. id:'.$id);
        }

        /* Obtenemos el total de la orden y el estado completado. */
        $amount = $order->getTotal();
        $state = PaymentInterface::STATE_COMPLETED;

        /* Le decimos la cantidad que se ha pagado y que el pago está completado. */
        $payment = $order->getPayment();
        $payment->setAmount($amount);
        $payment->setState($state);

        /* Actualizamos el estado del pago en el pedido */
        $stateResolver = new StateResolver();
        $stateResolver->resolvePaymentState($order);

        /* Persistimos el pago */
        $manager = $this->get('sylius.manager.payment');
        $manager->persist($payment);
        $manager->flush();

        /* Mensaje de éxito */
        $translator = $this->get('translator');
        $this->get('session')->getFlashBag()->add('success', $translator->trans('sylius.payment.success', array(), 'flashes'));

        /* Redirigimos */
        return $this->redirect($this->generateUrl('sylius_backend_order_index'));
    }
}
