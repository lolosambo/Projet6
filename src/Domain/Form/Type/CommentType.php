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

use App\Domain\DTO\CommentDTO;
use App\Domain\Form\Type\Interfaces\FormTypeInterface;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CommentType.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class CommentType extends AbstractType implements FormTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('content', CKEditorType::class, [
            'config' =>['toolbar' => 'my_toolbar_1'],
            'label' => 'Votre commentaire'
        ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CommentDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new CommentDTO(
                    $form->get('content')->getData()
                );
            },
            'validation_groups' => ['comment'],
        ]);
    }
}
