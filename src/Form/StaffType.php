<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class StaffType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('firstname')
            ->add('lastname')
            ->add('ss_number')
            ->add('hiring_date')
            ->add('me_date')
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Secretaire' => 'Secretaire',
                    'Plagiste' => 'Plagiste',
                    'Moniteur' => 'Moniteur'
                ]
            ])
            ->add('coastal_licence')
            ->add('bees')
            ->add('contract_type')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
