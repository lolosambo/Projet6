<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\Type;

use App\DTO\CommentDTO;
use App\Form\Type\Interfaces\FormTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CommentType.
 */
class CommentType extends AbstractType implements FormTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('content', TextareaType::class, ['label' => 'Votre commentaire ']);
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
