<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\TypeRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Type;

class TypeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // $builder
        // ->add('type', EntityType::class,[
        //     'class'=> Type:: class,
        //     'label' => function (TypeRepository $type) {
        //         return $type->createQueryBuilder('u')->orderBy('u.label','DESC');
        //         },
        //         'choice_label' => function ($x){
        //             return $x->getLabel();
        //         }
        //         ])
        // ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
