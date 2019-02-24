<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Datos;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\DateTime;


class DefaultController extends Controller
{
    /**
     * @Route("/registro", name="user_registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $date = $this->Time();
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            //3b) Datos
            /*$user->setRoles(array('ROLE_USER'));*/
            /*$datos = new Datos();
            $datos.nif = $user.nif;*/

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('datos_new');

        }

        return $this->render('registro.html.twig', array(
            'tiempo' => $date,
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/redirect", name="redirect")
     */
    public function redirectionAction(Request $request, UserInterface $user)
    {
        $dbUser = $this->getDoctrine()->getRepository('AppBundle:Datos')->find($user->getUsername());

        dump($dbUser);

        if (true) {
            dump('hola');
        } else if ($dbUser !== null) {
            return $this->redirectToRoute('datos_show', array('id' => $dbUser . id));
        } else {
            return $this->redirectToRoute('datos_new');
        }
    }

    /**
     * Compare date.
     *
     *
     * @return date
     */
    private function Time()
    {
        $time = new \DateTime("now");
        $timestringed = date_format($time, 'Y-m-d');
        return $timestringed;
    }


}
