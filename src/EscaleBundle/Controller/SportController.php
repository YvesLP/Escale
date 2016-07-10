<?php

namespace EscaleBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use EscaleBundle\Entity\Sport;
use EscaleBundle\Form\SportType;

/**
 * Sport controller.
 *
 */
class SportController extends Controller
{
    /**
     * Lists all Sport entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sports = $em->getRepository('EscaleBundle:Sport')->findAll();

        return $this->render('EscaleBundle:sport:index.html.twig', array(
            'sports' => $sports,
        ));
    }

    /**
     * Creates a new Sport entity.
     *
     */
    public function newAction(Request $request)
    {
        $sport = new Sport();
        $form = $this->createForm('EscaleBundle\Form\SportType', $sport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sport);
            $em->flush();

            return $this->redirectToRoute('admin_sport_show', array('id' => $sport->getId()));
        }

        return $this->render('EscaleBundle:sport:new.html.twig', array(
            'sport' => $sport,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sport entity.
     *
     */
    public function showAction(Sport $sport)
    {
        $deleteForm = $this->createDeleteForm($sport);

        return $this->render('EscaleBundle:sport:show.html.twig', array(
            'sport' => $sport,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Sport entity.
     *
     */
    public function editAction(Request $request, Sport $sport)
    {
        $deleteForm = $this->createDeleteForm($sport);
        $editForm = $this->createForm('EscaleBundle\Form\SportType', $sport);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($editForm->get('phPhoto')->getData() != null) {
                if($sport->getSportPhoto() != null) {
                    unlink(__DIR__.'/../../../web/uploads/picto_sport/'.$sport->getSportPhoto());
                    $sport->setSportPhoto(null);
                }
            }

            if($editForm->get('phPicto')->getData() != null) {
                if($sport->getSportPicto() != null) {
                    unlink(__DIR__.'/../../../web/uploads/picto_sport/'.$sport->getSportPicto());
                    $sport->setSportPicto(null);
                }
            }

            $sport->preUpload();

            $em->persist($sport);
            $em->flush();

            return $this->redirectToRoute('admin_sport_edit', array('id' => $sport->getId()));
        }

        return $this->render('EscaleBundle:sport:edit.html.twig', array(
            'sport' => $sport,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Sport entity.
     *
     */
    public function deleteAction(Request $request, Sport $sport)
    {
        $form = $this->createDeleteForm($sport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sport);
            $em->flush();
        }

        return $this->redirectToRoute('admin_sport_index');
    }

    /**
     * Creates a form to delete a Sport entity.
     *
     * @param Sport $sport The Sport entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sport $sport)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_sport_delete', array('id' => $sport->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
