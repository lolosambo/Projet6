<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\Type;

use App\Entity\Tricks;
use App\Form\Type\Interfaces\FormTypeInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UpdateTrickType.
 */
class UpdateTrickType extends AbstractType implements FormTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @return mixed|void
     */
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ) {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom de la figure'])
            ->add('group', EntityType::class, [
                'class' => 'App\Entity\Groups',
                'choice_label' => 'Group',
                    'expanded' => false,
                    'multiple' => false,
                ]
            )
            ->add('content', TextareaType::class, ['label' => 'Description']);
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return mixed|void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tricks::class,
            'empty_data' => function (FormInterface $form) {
                return new Tricks(
                    $form->get('name')->getData(),
                    $form->get('group')->getData(),
                    $form->get('content')->getData()
                );
            },
        ]);
    }
}
