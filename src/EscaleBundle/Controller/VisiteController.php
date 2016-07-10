<?php

namespace EscaleBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use EscaleBundle\Entity\Visite;
use EscaleBundle\Form\VisiteType;

/**
 * Visite controller.
 *
 */
class VisiteController extends Controller
{
    /**
     * Lists all Visite entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $visites = $em->getRepository('EscaleBundle:Visite')->findAll();

        return $this->render('EscaleBundle:visite:index.html.twig', array(
            'visites' => $visites,
        ));
    }

    /**
     * Creates a new Visite entity.
     *
     */
    public function newAction(Request $request)
    {
        $visite = new Visite();

        $em = $this->getDoctrine()->getManager();

        $visite->setVisitStart($request->request->get('start'));
        $visite->setVisitEnd($request->request->get('end'));
        $visite->setVisitIduser(5);
        $visite->setVisitIdspot(3);

        $em->persist($visite);
        $em->flush();

        return $this->redirectToRoute('visite_show');

    }


    /**
     * Finds and displays a Visite entity.
     *
     */
    public function showAction(Visite $visite)
    {
        $deleteForm = $this->createDeleteForm($visite);

        return $this->render('EscaleBundle:visite:show.html.twig', array(
            'visite' => $visite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Visite entity.
     *
     */
    public function editAction(Request $request, Visite $visite)
    {
        $deleteForm = $this->createDeleteForm($visite);
        $editForm = $this->createForm('EscaleBundle\Form\VisiteType', $visite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($visite);
            $em->flush();

            return $this->redirectToRoute('visite_edit', array('id' => $visite->getId()));
        }

        return $this->render('EscaleBundle:visite:edit.html.twig', array(
            'visite' => $visite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Visite entity.
     *
     */
    public function deleteAction(Request $request, Visite $visite)
    {
        $form = $this->createDeleteForm($visite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($visite);
            $em->flush();
        }

        return $this->redirectToRoute('visite_index');
    }

    /**
     * Creates a form to delete a Visite entity.
     *
     * @param Visite $visite The Visite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Visite $visite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('visite_delete', array('id' => $visite->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
