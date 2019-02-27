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

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            if ($this->getDoctrine()->getRepository('AppBundle:Datos')->find($user->getUsername()) === null) {
                return $this->redirectToRoute('datos_new');
            }

            return $this->redirectToRoute('datos_show', array('id' => $this->getDoctrine()->getRepository('AppBundle:Datos')->find($user->getUsername())->getId()));

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
        $usuario = $this->getDoctrine()->getRepository(User::class)->findOneByNif($user->getUsername());

        /*$rol = $usuario->getRoles();
        $rol = json_decode($rol);*/
        /*dump($rol);*/
        /*if ($rol === 'ROLE_ADMIN') {*/
        if (false) {
            return $this->redirectToRoute('admin');
        } else {
            $dbUser = $this->getDoctrine()->getRepository(Datos::class)->find($user->getUsername());

            if ($dbUser === null) {
                return $this->redirectToRoute('datos_new');
            }

            return $this->redirectToRoute('datos_show', array('id' => $dbUser->getId()));
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
