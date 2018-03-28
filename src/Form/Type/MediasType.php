<?php


namespace App\Form\Type;

use App\DTO\MediasDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('media', FileType::class, ['label' => 'Ajouter un media ', 'multiple' => false])
            ->add('aLaUne', CheckboxType::class, ['label'    => 'Image à la Une ', 'required' => false] );


    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MediasDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new MediasDTO(
                    $form->get('media')->getData(),
                    $form->get('aLaUne')->getData()
                );
            },
        ]);
    }


}