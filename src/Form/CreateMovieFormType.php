<?php

namespace App\Form;

use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateMovieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr'=>array('class'=>'form-control',
                              'placeholder'=>'enter title...'),
                'label'=>'Title'])
            ->add('description', TextareaType::class, [
                'attr'=>array('class'=>'form-control',
                    'placeholder'=>'enter description...','rows'=>'3'),
                'label'=>'Description'])
//            ->add('user_id')
//            ->add('createdAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}
