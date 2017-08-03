<?php

namespace PortfolioBundle\Controller;

use PortfolioBundle\Form\ProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/user")
     */
    public function dashboardAction(Request $request)
    {
        $user = $this->getUser();
        $profileType = $this->createForm(ProfileType::class, $user, [
            'action' => $this->generateUrl('portfolio_user_profile'),
        ]);

        return $this->render('PortfolioBundle:User:dashboard.html.twig', array(
            'profileForm' => $profileType->createView(),
            'user' => $user,
        ));
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/user/profile")
     */
    public function profileAction(Request $request)
    {
        $profileType = $this->createForm(ProfileType::class, $this->getUser());
        $profileType->handleRequest($request);

        if ($profileType->isSubmitted() && $profileType->isValid()) {
            $user = $profileType->getData();
            $em = $this->getDoctrine()->getManager();
            $em->merge($user);
            $em->flush();
            $this->addFlash('success-profile', 'Successfully updated profile information');
            return $this->redirectToRoute('portfolio_user_dashboard');
        }

        return $this->render('PortfolioBundle:User:profile.html.twig', [
            'profileForm' => $profileType->createView(),
        ]);
    }
}
