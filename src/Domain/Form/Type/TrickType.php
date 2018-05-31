<?php

declare(strict_types=1);

/*
 * This file is part of the SnowTricks project.
 *
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\Form\Type;

use App\Domain\DTO\TrickAddDTO;
use App\Domain\Form\Type\Interfaces\FormTypeInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class TrickType.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class TrickType extends AbstractType implements FormTypeInterface
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
                'class' => 'App\Domain\Models\Groups',
                'choice_label' => 'name',
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
            'data_class' => TrickAddDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new TrickAddDTO(
                    $form->get('name')->getData(),
                    $form->get('group')->getData(),
                    $form->get('content')->getData()
                );
            },
            'validation_groups' => ['TricksAdd'],
        ]);
    }
}
