<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Datos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Dato controller.
 *
 * @Route("datos")
 */
class DatosController extends Controller
{
    /**
     * Lists all dato entities.
     *
     * @Route("/", name="datos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $datos = $em->getRepository('AppBundle:Datos')->findAll();

        return $this->render('datos/index.html.twig', array(
            'datos' => $datos,
        ));
    }

    /**
     * Creates a new dato entity.
     *
     * @Route("/new", name="datos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dato = new Dato();
        $form = $this->createForm('AppBundle\Form\DatosType', $dato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dato);
            $em->flush();

            return $this->redirectToRoute('datos_show', array('id' => $dato->getId()));
        }

        return $this->render('datos/new.html.twig', array(
            'dato' => $dato,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dato entity.
     *
     * @Route("/{id}", name="datos_show")
     * @Method("GET")
     */
    public function showAction(Datos $dato)
    {
        $deleteForm = $this->createDeleteForm($dato);

        return $this->render('datos/show.html.twig', array(
            'dato' => $dato,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dato entity.
     *
     * @Route("/{id}/edit", name="datos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Datos $dato)
    {
        $deleteForm = $this->createDeleteForm($dato);
        $editForm = $this->createForm('AppBundle\Form\DatosType', $dato);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('datos_edit', array('id' => $dato->getId()));
        }

        return $this->render('datos/edit.html.twig', array(
            'dato' => $dato,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dato entity.
     *
     * @Route("/{id}", name="datos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Datos $dato, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository(Datos::class)->delete($id);

        return $this->redirectToRoute('datos_index');
    }

    /**
     * Creates a form to delete a dato entity.
     *
     * @param Datos $dato The dato entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Datos $dato)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('datos_delete', array('id' => $dato->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
