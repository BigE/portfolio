<?php

namespace PortfolioBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;

trait PasswordType
{
    public function buildPasswordForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plainPassword', RepeatedType::class, [
                'type' => \Symfony\Component\Form\Extension\Core\Type\PasswordType::class,
                'invalid_message' => 'Passwords must match, please enter your password again',
                'first_options' => [
                    'attr' => [
                        'maxlength' => 255,
                        'size' => 30,
                    ],
                    'label' => 'Password',
                ],
                'second_options' => [
                    'attr' => [
                        'maxlength' => 255,
                        'size' => 30,
                    ],
                    'label' => 'Confirm Password',
                ],
            ]);
    }
}