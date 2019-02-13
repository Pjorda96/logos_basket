<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Datos;
use AppBundle\Form\DatosType;
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
     * Creates a new dato entity.
     *
     * @Route("/new", name="datos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dato = new Datos();
        $form = $this->createForm(DatosType::class, $dato);
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
    public function showAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        //$dato = $em->getRepository(Datos::class)->findOneByDni($this->getUser());
        $dato = $em->getRepository(Datos::class)->findOneById(1);

        $fechaNacimiento = $em->getRepository(Datos::class)->findOneById($id)->getFechaNacimiento();
        dump($fechaNacimiento);
        $olderAge =  $this->isAdult($fechaNacimiento);
        dump($olderAge);

        return $this->render('datos/show.html.twig', array(
            'dato' => $dato,
            'olderAge' => $olderAge,
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
        $editForm = $this->createForm('AppBundle\Form\DatosType', $dato);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('datos_edit', array('id' => $dato->getId()));
        }

        return $this->render('datos/edit.html.twig', array(
            'dato' => $dato,
            'edit_form' => $editForm->createView(),
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
     * Compare age to 18.
     *
     * @param Datos $fechaNacimiento The dato entity
     *
     * @return boolean
     */
    private function isAdult($fechaNacimiento)

    {
        $fechastring=date_format($fechaNacimiento, 'Y-m-d');
        dump($fechastring);
        $then=strtotime($fechastring);
        $min = strtotime('+18 years', $then);
        if(time() < $min)  {
            return false;
        }
        return true;

    }
}
