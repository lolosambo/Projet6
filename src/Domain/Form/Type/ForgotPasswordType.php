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

use App\Domain\DTO\ForgotPasswordDTO;
use App\Domain\Form\Type\Interfaces\FormTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RetrievePasswordType.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ForgotPasswordType extends AbstractType implements FormTypeInterface
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
        $builder->add('pseudo', TextType::class, ['label' => 'Pseudo'])
                ->add('mail', EmailType::class, ['label' => 'E-mail']);
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return mixed|void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ForgotPasswordDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new ForgotPasswordDTO(
                    $form->get('pseudo')->getData(),
                    $form->get('mail')->getData()
                );
            },
            'validation_groups' => ['retrieve_password']
        ]);
    }
}