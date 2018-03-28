<?php


namespace App\Form\Type;

use App\DTO\TrickAddDTO;
use App\Entity\Tricks;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UpdateTrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('name', TextType::class, array('label' => 'Nom de la figure'))
            ->add('group', EntityType::class, array (
                'class' => 'App\Entity\Groups',
                'choice_label' => 'Group',
                    'expanded' => false,
                    'multiple' => false
                )
            )
            ->add('content', TextareaType::class, array('label' => 'Description'));

    }

    public function configureOptions(OptionsResolver $resolver) {
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