<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
            ->add ('category', EntityType::class, [
                'class' => Category::class,
                'required' => false,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('seller', EntityType::class, [
                'class' => User::class,
                'required' => false,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('price', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix ',
                ]
            ])
    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
       
    
        ]);
    }
}
