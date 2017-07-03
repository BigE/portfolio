<?php

namespace PortfolioBundle\Form;


use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class RegisterType extends UserType
{
    use PasswordType;

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $this->buildPasswordForm($builder, $options);
        $builder
            ->add('submit', SubmitType::class, ['label' => 'Register'])
            ->add('reset', ResetType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_register';
    }
}
