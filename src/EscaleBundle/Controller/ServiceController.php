<?php

namespace EscaleBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use EscaleBundle\Entity\Service;
use EscaleBundle\Form\ServiceType;

/**
 * Service controller.
 *
 */
class ServiceController extends Controller
{
    /**
     * Lists all Service entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $services = $em->getRepository('EscaleBundle:Service')->findAll();

        return $this->render('EscaleBundle:service:index.html.twig', array(
            'services' => $services,
        ));
    }

    /**
     * Creates a new Service entity.
     *
     */
    public function newAction(Request $request)
    {
        $service = new Service();
        $form = $this->createForm('EscaleBundle\Form\ServiceType', $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($service);
            $em->flush();

            return $this->redirectToRoute('admin_service_show', array('id' => $service->getId()));
        }

        return $this->render('EscaleBundle:service:new.html.twig', array(
            'service' => $service,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Service entity.
     *
     */
    public function showAction(Service $service)
    {
        $deleteForm = $this->createDeleteForm($service);

        return $this->render('EscaleBundle:service:show.html.twig', array(
            'service' => $service,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Service entity.
     *
     */
    public function editAction(Request $request, Service $service)
    {
        $deleteForm = $this->createDeleteForm($service);
        $editForm = $this->createForm('EscaleBundle\Form\ServiceType', $service);
        $editForm->handleRequest($request);


        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($service);
            $em->flush();

            return $this->redirectToRoute('admin_service_edit', array('id' => $service->getId()));
        }

        return $this->render('EscaleBundle:service:edit.html.twig', array(
            'service' => $service,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Service entity.
     *
     */
    public function deleteAction(Request $request, Service $service)
    {
        $form = $this->createDeleteForm($service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($service);
            $em->flush();
        }

        return $this->redirectToRoute('admin_service_index');
    }

    /**
     * Creates a form to delete a Service entity.
     *
     * @param Service $service The Service entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Service $service)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_service_delete', array('id' => $service->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
