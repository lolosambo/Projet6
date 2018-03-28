<?php


namespace App\Form\Type;

use App\DTO\TrickAddDTO;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('name', TextType::class, ['label' => 'Nom de la figure'])
            ->add('group', EntityType::class, [
                'class' => 'App\Entity\Groups',
                'choice_label' => 'Group',
                    'expanded' => false,
                    'multiple' => false
                ]
            )
            ->add('content', TextareaType::class, ['label' => 'Description']);

    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => TrickAddDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new TrickAddDTO(
                    $form->get('name')->getData(),
                    $form->get('group')->getData(),
                    $form->get('content')->getData()
                );
            },
        ]);
    }

}