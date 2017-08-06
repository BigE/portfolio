<?php

namespace PortfolioBundle\Controller;

use PortfolioBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        $contactType = $this->createForm(ContactType::class);

        if ($contactType->isSubmitted() && $contactType->isValid()) {
        } else if ($contactType->isSubmitted() && !$contactType->isValid()) {
        }

        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $contactType = $this->createForm(ContactType::class, null, [
            'action' => 'contact',
        ]);

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'contactForm' => $contactType->createView(),
        ]);
    }
}
