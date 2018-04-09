<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\Type;

use App\DTO\ConnectUserDTO;
use App\Form\Type\Interfaces\FormTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ConnectionType.
 */
class ConnectionType extends AbstractType implements FormTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @return mixed|void
     */
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ) {
        $builder
            ->add('pseudo', TextType::class, ['label' => 'Utilisateur'])
            ->add('password', PasswordType::class, ['label' => 'Mot de passe']);
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return mixed|void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
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
