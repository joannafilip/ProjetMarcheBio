<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\TypeRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProduitFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('prix')
            ->add ('type', ChoiceType::class, [
                'choices' => [
                    'boissons' => 'boissons',
                    'fruits' => 'fruits',
                    'legumes' => 'legumes',
                    'cremerie' => 'cremerie',
                    'boulangerie' => 'boulangerie',
                    'epicerie' => 'epicerie',
                    'cremerie' => 'cremerie',
                    
                ],
            // ->add ('type', EntityType::class, [
            //     'class' => Type::class,
            //     /*'query_builder' => function (GenreRepository $er){
            //         return $er->createQueryBuilder('u')->orderBy ('u.nom','DESC');
            //     },
            //     // on affiche ici les noms et les descriptions en majuscules,
            //     // mais c'est à vous de choisir la façon de l'afficher
            //     'choice_label' => function ($x){
            //         return strtoupper($x->getNom() . "-". $x->getDescription());
            //     }*/
            //     'choice_label' => function (TypeRepository $g) {
            //         return $g->findAll();
            //     }
            // ]);
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // $resolver->setDefaults([
        //     'type'=> Type::class,
        // ]);
    }
}
