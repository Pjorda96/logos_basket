<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Datos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Security controller.
 *
 * @Route("security")
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request)
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $fichas = $this->getDoctrine()->getRepository(Datos::class)->findAll();

        return $this->render('admin.html.twig', array(
            'categories' => $categories,
            'fichas' => $fichas
        ));
    }
}
