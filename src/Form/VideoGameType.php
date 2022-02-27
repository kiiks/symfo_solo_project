<?php

namespace App\Form;

use App\Entity\GameCategory;
use App\Entity\VideoGame;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class VideoGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('launchDate', DateType::class)
            ->add('studio', TextType::class)
            ->add('editor', TextType::class)
            ->add('categories', CollectionType::class, [
                'attr' => $options['attr']
            ])
            ->add('create_video_game', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => VideoGame::class,
        ]);
    }
}
