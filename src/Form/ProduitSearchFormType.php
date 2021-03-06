<?php

namespace App\Form;

use App\Entity\ProduitSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitSearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxPrix', IntegerType::class,
            [
                'required'=>false,
                'label'=>false,
                'attr'=>[
                    'placeholder' => 'Prix max'
                ]
            ])
            ->add('nomProduit', TextType::class, [
                'required'=>false,
                'label'=>false,
                'attr'=>[
                    'placeholder' => 'Nom de produit'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProduitSearch::class,
            'method' => 'get',
            'csrf_protection' => false,
        ]);
    }

    public function getBlockPrefix(){
        return '';
    }

}
