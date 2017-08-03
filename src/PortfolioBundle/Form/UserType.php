<?php

namespace PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'maxlength' => 255,
                    'placeholder' => 'user@example.net',
                    'size' => 30,
                ],
            ])
            ->add('username', TextType::class, [
                'attr' => [
                    'maxlength' => 100,
                    'placeholder' => 'h@x0r',
                    'size' => 30,
                ]
            ])
            ->add('name', TextType::class, [
                'attr' => [
                    'maxlength' => 255,
                    'placeholder' => 'John Doe',
                    'size' => 30,
                ],
                'required' => false,
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PortfolioBundle\Entity\User'
        ));
    }

}
