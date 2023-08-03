<?php

namespace App\Form;

use App\Entity\RendezVous;
use App\Entity\Terrain;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date',DateType::class)
            ->add('heure')
            ->add('user', EntityType::class,[
                'class'=>user::class,
                'choice_label'=>'email '
            ])
            ->add('terrain', EntityType::class,[
                'class'=>Terrain::class,
                'choice_label'=>'adress '
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
        ]);
    }
}
