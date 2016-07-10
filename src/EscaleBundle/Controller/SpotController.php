<?php

namespace EscaleBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use EscaleBundle\Entity\Spot;
use EscaleBundle\Form\SpotType;

/**
 * Spot controller.
 *
 */
class SpotController extends Controller
{
    /**
     * Lists all Spot entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $spots = $em->getRepository('EscaleBundle:Spot')->findAll();

        return $this->render('EscaleBundle:spot:index.html.twig', array(
            'spots' => $spots,
        ));
    }

    /**
     * Creates a new Spot entity.
     *
     */
    public function newAction(Request $request)
    {
        $spot = new Spot();
        $form = $this->createForm('EscaleBundle\Form\SpotType', $spot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($spot);
            $em->flush();

            return $this->redirectToRoute('map');
        }

        return $this->render('EscaleBundle:spot:new.html.twig', array(
            'spot' => $spot,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Spot entity.
     *
     */
    public function showAction(Spot $spot)
    {
        $deleteForm = $this->createDeleteForm($spot);

        return $this->render('EscaleBundle:spot:show.html.twig', array(
            'spot' => $spot,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Spot entity.
     *
     */
    public function editAction(Request $request, Spot $spot)
    {
        $deleteForm = $this->createDeleteForm($spot);
        $editForm = $this->createForm('EscaleBundle\Form\SpotType', $spot);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($editForm->get('phPhoto')->getData() != null) {
                if($spot->getSpotPhoto() != null) {
                    unlink(__DIR__.'/../../../web/uploads/spot/'.$spot->getSpotPhoto());
                    $spot->setSpotPhoto(null);
                }
            }

            $spot->preUpload();

            $em->persist($spot);
            $em->flush();

            return $this->redirectToRoute('admin_spot_edit', array('id' => $spot->getId()));
        }

        return $this->render('EscaleBundle:spot:edit.html.twig', array(
            'spot' => $spot,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Spot entity.
     *
     */
    public function deleteAction(Request $request, Spot $spot)
    {
        $form = $this->createDeleteForm($spot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($spot);
            $em->flush();
        }

        return $this->redirectToRoute('admin_spot_index');
    }

    /**
     * Creates a form to delete a Spot entity.
     *
     * @param Spot $spot The Spot entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Spot $spot)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_spot_delete', array('id' => $spot->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
