<?php

namespace PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => 'Your Name',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Please provide your name']),
                ]
            ])
            ->add('subject', TextType::class, [
                'attr' => [
                    'placeholder' => 'Subject',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Please provide a subject']),
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Your e-mail address',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Please provide your e-mail address']),
                    new Email(['message' => 'Your e-mail address doesn\'t seem to be valid']),
                ],
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Your message you would like to send me',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'You must enter a message']),
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Send Message',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'portfolio_bundle_contact_type';
    }
}
