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

use App\Domain\DTO\ImagesDTO;
use App\Domain\Form\Type\Interfaces\FormTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ImagesType.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ImagesType extends AbstractType implements FormTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ) {
        $builder
            ->add('image', FileType::class, [
                    'multiple' => true,
                    ]
            );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ImagesDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new ImagesDTO(
                    $form->get('image')->getData()
                );
            },
//            'validation_groups' => ['images'],
        ]);
    }
}

