<?php

namespace PortfolioBundle\Controller;

use PortfolioBundle\Entity\User;
use PortfolioBundle\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authUtils = $this->get('security.authentication_utils');
        return $this->render('@Portfolio/Security/login.html.twig', array(
            'error' => $authUtils->getLastAuthenticationError(),
            'username' => $authUtils->getLastUsername(),
        ));
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/register")
     */
    public function registerAction(Request $request)
    {
        $user = new User();

        $registerForm = $this->createForm(RegisterType::class, $user);
        $registerForm->handleRequest($request);

        if ($registerForm->isSubmitted() && $registerForm->isValid()) {
            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('login');
        }

        return $this->render('@Portfolio/Security/register.html.twig', array(
            'registerForm' => $registerForm->createView(),
        ));
    }
}
