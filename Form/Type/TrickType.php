<?php


namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('Figure', TextType::class)
            ->add('Groupe', ChoiceType::class, ['choice' => $groups])
            ->add('Description', TextareaType::class)
            ->add('Publier', SubmitType::class)
            ->add('Réinitialiser', ResetType::class);
    }

}