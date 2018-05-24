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

use App\Domain\DTO\ALaUneDTO;
use App\Domain\Form\Type\Interfaces\FormTypeInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ALaUneType.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ALaUneType extends AbstractType implements FormTypeInterface
{
    /**
     * @var
     */
    private $options;

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ) {
        $this->options = $options['trickId'];
        $builder
            ->add('aLaUne', EntityType::class, [
                    'class' => 'App\Domain\Models\Images',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('i')
                            ->where('i.trickId = ?1')
                            ->setParameter(1, $this->options);
                    },
                    'choice_label' => 'url',
                    'expanded' => false,
                    'multiple' => false,
                ]
            );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AlaUneDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new ALaUneDTO(
                    $form->get('url')->getData()
                );
            },
            'trickId' => 18,
        ]);
    }
}
