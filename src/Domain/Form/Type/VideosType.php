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

use App\Domain\DTO\VideosDTO;
use App\Domain\Form\Type\Interfaces\FormTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class VideosType.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class VideosType extends AbstractType implements FormTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address1', TextType::class, ['label' => 'Lien vidéo 1'])
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
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => VideosDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new VideosDTO(
                    $form->get('address1')->getData(),
                    $form->get('address2')->getData(),
                    $form->get('address3')->getData(),
                    $form->get('address4')->getData()
                );
            },
        ]);
    }
}
