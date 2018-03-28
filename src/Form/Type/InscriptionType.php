<?php


namespace App\Form\Type;

use App\DTO\InscriptionUserDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class InscriptionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('pseudo', TextType::class)
            ->add('password', PasswordType::class)
            ->add('password2', PasswordType::class, ['mapped' => false])
            ->add('mail', EmailType::class);

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => InscriptionUserDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new InscriptionUserDTO(
                    $form->get('pseudo')->getData(),
                    $form->get('password')->getData(),
                    $form->get('password2')->getData(),
                    $form->get('mail')->getData()
                );
            },
        ]);
    }

}