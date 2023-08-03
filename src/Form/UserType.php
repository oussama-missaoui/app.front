<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('nom')
            ->add('prenom')
            ->add('sexe',ChoiceType::class,
            [
                'choices' => [
                    'Homme'=> 'Homme',
                    'Femme' => 'Femme',
                ],
            ])
            ->add('num_tel')
            ->add('rendez_vousID')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
