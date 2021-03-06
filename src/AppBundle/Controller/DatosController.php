<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Datos;
use AppBundle\Form\DatosType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\File\File;

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
        $em = $this->getDoctrine()->getManager();

        $dato = new Datos();
        $form = $this->createForm(DatosType::class, $dato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /*****Imagen*****/
            $fotoFile = $dato->getImage();
            if ($fotoFile !== null) {
                $fileName = $this->generateUniqueFileName() . '.' . $fotoFile->guessExtension();

                // moves the file to the directory where brochures are stored
                $fotoFile->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );
                $dato->setImage($fileName);
            }
            /*****Imagen*****/

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
        $dato = $em->getRepository(Datos::class)->findOneById($id);

        $fechaNacimiento = $em->getRepository(Datos::class)->findOneById($id)->getFechaNacimiento();
        $fechastring = date_format($fechaNacimiento, 'd-m-Y');
        $adult = $this->isAdult($fechaNacimiento);


        return $this->render('datos/show.html.twig', array(
            'dato' => $dato,
            'fechanac' => $fechastring,
            'adult' => $adult
        ));
    }

    /**
     * Displays a form to edit an existing dato entity.
     *
     * @Route("/{id}/edit", name="datos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $id)
    {
        $user = $this->getDoctrine()->getRepository(Datos::class)->find($id);
        $category = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $editForm = $this->createForm(DatosType::class, $user);
        $editForm->handleRequest($request);


        if ($editForm->isSubmitted() && $editForm->isValid()) {
            /*****Imagen*****/
            $fotoFile = $user->getImage();
            if ($fotoFile !== null) {
                $fileName = $this->generateUniqueFileName() . '.' . $fotoFile->guessExtension();

                // moves the file to the directory where brochures are stored
                $fotoFile->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );
                $user->setImage($fileName);
            }
            /*****Imagen*****/

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('datos_show', array('id' => $user->getId()));
        }

        return $this->render('datos/edit.html.twig', array(
            'dato' => $user,
            'edit_form' => $editForm->createView(),
            'categorias' => $category,
        ));
    }

    /**
     * Deletes a dato entity.
     *
     * @Route("/{id}", name="datos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id, UserInterface $user)
    {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository(Datos::class)->delete($id);

        return $this->redirectToRoute('datos_show', array('id' => $user->getId()));
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
        $fechastring = date_format($fechaNacimiento, 'd-m-Y');
        $then = strtotime($fechastring);
        $min = strtotime('+18 years', $then);
        if (time() < $min) {
            return false;
        }
        return true;

    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}
