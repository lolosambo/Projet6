<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\Type\Interfaces;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Interface FormTypeInterface.
 */
interface FormTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @return mixed
     */
    public function buildForm(FormBuilderInterface $builder, array $options);

    /**
     * @param OptionsResolver $resolver
     *
     * @return mixed
     */
    public function configureOptions(OptionsResolver $resolver);
}
