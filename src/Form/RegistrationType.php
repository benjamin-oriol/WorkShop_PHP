<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email', 'attr' => array('placeholder' => 'Entrez votre email')
            ])
            ->add('username', TextareaType::class, [
                'label' => 'Pseudo', 'attr' => array('placeholder' => 'Entrez votre pseudo')
            ])
            ->add('firstname', TextareaType::class, [
                'label' => 'Prénom', 'attr' => array('placeholder' => 'Entrez votre prénom')
            ])
            ->add('lastname', TextareaType::class, [
                'label' => 'Nom', 'attr' => array('placeholder' => 'Entrez votre nom')
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe', 'attr' => array('placeholder' => 'Entrez votre mot de passe')
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
