<?php

namespace PortfolioBundle\Controller;

use PortfolioBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $json = ['success' => false];
        $contactType = $this->createForm(ContactType::class);
        $contactType->handleRequest($request);

        if ($contactType->isSubmitted()) {
            if ($contactType->isValid()) {
                $contact = $contactType->getData();
                $mailer = $this->get('swiftmailer.mailer.default');
                $message = (new \Swift_Message('Portfolio Contact'))
                    ->setFrom('noreply@ericgach.me', 'No Reply')
                    ->setTo($contact['email'], $contact['name'])
                    ->addCC('eric.gach@gmail.com', 'Eric Gach')
                    ->setBody(
                        $this->renderView('PortfolioBundle:Email:contact.html.twig', [
                            'contact' => $contact,
                        ]),
                        'text/html'
                    );

                $mailer->send($message);
                $json['success'] = true;
                $json['message'] = 'Thank you for contacting me! I will respond to you soon.';
            } else if ($contactType->isSubmitted() && !$contactType->isValid()) {
                $json['message'] = [];
                foreach ($contactType->getErrors() as $error) {
                    $json['message'][] = $error->getMessage();
                }

                $json['errors'] = [];
                foreach ($contactType as $item) {
                    if (($errors = $item->getErrors())->count() > 0) {
                        $json['errors'][$item->getName()] = [];
                        do {
                            $json['errors'][$item->getName()][] = $errors->current()->getMessage();
                        } while ($errors->next());
                    }
                }
            }

            if ($request->isXmlHttpRequest()) {
                return new JsonResponse($json);
            }

            if (isset($json['errors'])) {
                $this->addFlash($contactType->getName(), 'Unable to complete contact form, please try again');
                foreach ($json['errors'] as $key => $error) {
                    $this->addFlash($contactType->getName() . '_' . $key, implode(',', $error));
                }
            } else {
                $this->addFlash($contactType->getName() . '_success', $json['message']);
            }
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
