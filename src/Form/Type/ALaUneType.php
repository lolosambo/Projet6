<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\Type;

use App\DTO\ALaUneDTO;
use App\Form\Type\Interfaces\FormTypeInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ALaUneType.
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
                    'class' => 'App\Entity\Medias',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('m')
                            ->where('m.trickId = ?1')
                            ->andWhere('m.type = ?2')
                            ->setParameter(1, $this->options)
                            ->setParameter(2, 'Image');
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
