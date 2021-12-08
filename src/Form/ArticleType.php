<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title', TextType::class, [
            'attr' => [
                'class' => 'form-controle'
            ]
        ])
       
        ->add('description', TextareaType::class, [
            'attr' => [
                'class' => 'form-control'
            ]
        ])
        ->add('published', CheckboxType::class)
        ->add('image', TextType::class, [
            "mapped" => false,
            "required" => false,
            "constraints" => [
                new Image([
                    "mimeTypesMessage" => "Seuls les fichiers images sont acceptés",
                    "maxSize" => "2048k",
                    "maxSizeMessage" => "Le fichier ne doit pas dépasser 2Mo"
                ])
            ]
        ])
        ->add('create_At')
        ->add('user')
        ->add('categorie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
