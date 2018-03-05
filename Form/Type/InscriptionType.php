<?php


namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('Pseudo', TextType::class)
                ->add('Password', PasswordType::class)
                ->add('Password2', PasswordType::class)
                ->add('Email', EmailTypeType::class)
                ->add('S\'inscrire', SubmitType::class)
                ->add('Réinitialiser', ResetType::class);
    }

}