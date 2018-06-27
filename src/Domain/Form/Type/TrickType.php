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
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
     * @param array $options
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
            ->add('content', CKEditorType::class, [
                'config' =>['toolbar' => 'my_toolbar_1'],
                'label' => 'Description'
            ])
            ->add('image', FileType::class, [
                'multiple' => true,
            ])
            ->add('address1', TextType::class, [
                'label' => 'Lien vidéo 1',
                'required' => false,])
            ->add('address2', TextType::class, [
                'label' => 'Lien vidéo 2',
                'required' => false,
            ])
            ->add('address3', TextType::class, [
                'label' => 'Lien vidéo 3',
                'required' => false,
            ])
            ->add('address4', TextType::class, [
                'label' => 'Lien vidéo 4',
                'required' => false,
            ]);
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
                    $form->get('content')->getData(),
                    $form->get('image')->getData(),
                    $form->get('address1')->getData(),
                    $form->get('address2')->getData(),
                    $form->get('address3')->getData(),
                    $form->get('address4')->getData()
                );
            },
            'validation_groups' => ['TricksAdd'],
        ]);
    }
}
