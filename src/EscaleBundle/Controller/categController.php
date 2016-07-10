<?php

namespace EscaleBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use EscaleBundle\Entity\categ;
use EscaleBundle\Form\categType;

/**
 * categ controller.
 *
 */
class categController extends Controller
{
    /**
     * Lists all categ entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categs = $em->getRepository('EscaleBundle:categ')->findAll();

        return $this->render('EscaleBundle:categ:index.html.twig', array(
            'categs' => $categs,
        ));
    }

    /**
     * Creates a new categ entity.
     *
     */
    public function newAction(Request $request)
    {
        $categ = new categ();
        $form = $this->createForm('EscaleBundle\Form\categType', $categ);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categ);
            $em->flush();

            return $this->redirectToRoute('admin_categ_show', array('id' => $categ->getId()));
        }

        return $this->render('EscaleBundle:categ:new.html.twig', array(
            'categ' => $categ,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categ entity.
     *
     */
    public function showAction(categ $categ)
    {
        $deleteForm = $this->createDeleteForm($categ);

        return $this->render('EscaleBundle:categ:show.html.twig', array(
            'categ' => $categ,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categ entity.
     *
     */
    public function editAction(Request $request, categ $categ)
    {
        $deleteForm = $this->createDeleteForm($categ);
        $editForm = $this->createForm('EscaleBundle\Form\categType', $categ);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($editForm->get('phPicto')->getData() != null) {
                if($categ->getCatPicto() != null) {
                    unlink(__DIR__.'/../../../web/uploads/picto_categ/'.$categ->getCatPicto());
                    $categ->setCatPicto(null);
                }
            }

            $categ->preUpload();

            $em->persist($categ);
            $em->flush();

            return $this->redirectToRoute('admin_categ_edit', array('id' => $categ->getId()));
        }

        return $this->render('EscaleBundle:categ:edit.html.twig', array(
            'categ' => $categ,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categ entity.
     *
     */
    public function deleteAction(Request $request, categ $categ)
    {
        $form = $this->createDeleteForm($categ);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categ);
            $em->flush();
        }

        return $this->redirectToRoute('admin_categ_index');
    }

    /**
     * Creates a form to delete a categ entity.
     *
     * @param categ $categ The categ entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(categ $categ)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_categ_delete', array('id' => $categ->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
