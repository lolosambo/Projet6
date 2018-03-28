<?php


namespace App\Form\Type;


use App\Entity\Users;
use App\DTO\ConnectUserDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConnectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('pseudo', TextType::class, array('label' => 'Utilisateur'))
            ->add('password', PasswordType::class, array('label' => 'Mot de passe'));


    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => ConnectUserDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new ConnectUserDTO(
                    $form->get('pseudo')->getData(),
                    $form->get('password')->getData(),
                    $form->get('mail')->getData()

                  );
               },
            ]);
    }

}