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
        $contactType->handleRequest($request);

        if ($contactType->isSubmitted() && $contactType->isValid()) {
            $contact = $contactType->getData();
            $mailer = $this->get('swiftmailer.mailer.default');
            $message = (new \Swift_Message('Portfolio Contact'))
                ->setFrom($contact['email'], $contact['name'])
                ->setTo('eric.gach@gmail.com', 'Eric Gach')
                ->addCc($contact['email'], $contact['name'])
                ->setBody(
                    $this->renderView('PortfolioBundle:Email:contact.html.twig', [
                        'contact' => $contact,
                    ]),
                    'text/html'
                )
            ;

            $mailer->send($message);
        } else if ($contactType->isSubmitted() && !$contactType->isValid()) {
        }

        return $this->redirectToRoute('homepage', ['_fragment' => 'contact']);
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
