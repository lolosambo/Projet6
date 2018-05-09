<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'form.registry' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/form/FormExtensionInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/form/Extension/DependencyInjection/DependencyInjectionExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/form/FormRegistryInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/form/FormRegistry.php';

return $this->privates['form.registry'] = new \Symfony\Component\Form\FormRegistry(array(0 => new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension(new \Symfony\Component\DependencyInjection\ServiceLocator(array('App\\Domain\\Form\\Type\\ALaUneType' => function () {
    return ($this->privates['App\Domain\Form\Type\ALaUneType'] ?? $this->privates['App\Domain\Form\Type\ALaUneType'] = new \App\Domain\Form\Type\ALaUneType());
}, 'App\\Domain\\Form\\Type\\CommentType' => function () {
    return ($this->privates['App\Domain\Form\Type\CommentType'] ?? $this->privates['App\Domain\Form\Type\CommentType'] = new \App\Domain\Form\Type\CommentType());
}, 'App\\Domain\\Form\\Type\\ConnectionType' => function () {
    return ($this->privates['App\Domain\Form\Type\ConnectionType'] ?? $this->privates['App\Domain\Form\Type\ConnectionType'] = new \App\Domain\Form\Type\ConnectionType());
}, 'App\\Domain\\Form\\Type\\ImagesType' => function () {
    return ($this->privates['App\Domain\Form\Type\ImagesType'] ?? $this->privates['App\Domain\Form\Type\ImagesType'] = new \App\Domain\Form\Type\ImagesType());
}, 'App\\Domain\\Form\\Type\\InscriptionType' => function () {
    return ($this->privates['App\Domain\Form\Type\InscriptionType'] ?? $this->privates['App\Domain\Form\Type\InscriptionType'] = new \App\Domain\Form\Type\InscriptionType());
}, 'App\\Domain\\Form\\Type\\TrickType' => function () {
    return ($this->privates['App\Domain\Form\Type\TrickType'] ?? $this->privates['App\Domain\Form\Type\TrickType'] = new \App\Domain\Form\Type\TrickType());
}, 'App\\Domain\\Form\\Type\\UpdateTrickType' => function () {
    return ($this->privates['App\Domain\Form\Type\UpdateTrickType'] ?? $this->privates['App\Domain\Form\Type\UpdateTrickType'] = new \App\Domain\Form\Type\UpdateTrickType());
}, 'App\\Domain\\Form\\Type\\VideosType' => function () {
    return ($this->privates['App\Domain\Form\Type\VideosType'] ?? $this->privates['App\Domain\Form\Type\VideosType'] = new \App\Domain\Form\Type\VideosType());
}, 'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType' => function () {
    return ($this->privates['form.type.entity'] ?? $this->load('getForm_Type_EntityService.php'));
}, 'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType' => function () {
    return ($this->privates['form.type.choice'] ?? $this->load('getForm_Type_ChoiceService.php'));
}, 'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => function () {
    return ($this->privates['form.type.form'] ?? $this->load('getForm_Type_FormService.php'));
})), array('Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => new RewindableGenerator(function () {
    yield 0 => ($this->privates['form.type_extension.form.http_foundation'] ?? $this->load('getForm_TypeExtension_Form_HttpFoundationService.php'));
    yield 1 => ($this->privates['form.type_extension.form.validator'] ?? $this->load('getForm_TypeExtension_Form_ValidatorService.php'));
    yield 2 => ($this->privates['form.type_extension.upload.validator'] ?? $this->load('getForm_TypeExtension_Upload_ValidatorService.php'));
    yield 3 => ($this->privates['form.type_extension.csrf'] ?? $this->load('getForm_TypeExtension_CsrfService.php'));
    yield 4 => ($this->privates['form.type_extension.form.data_collector'] ?? $this->load('getForm_TypeExtension_Form_DataCollectorService.php'));
}, 5), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\RepeatedType' => new RewindableGenerator(function () {
    yield 0 => ($this->privates['form.type_extension.repeated.validator'] ?? $this->privates['form.type_extension.repeated.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension());
}, 1), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\SubmitType' => new RewindableGenerator(function () {
    yield 0 => ($this->privates['form.type_extension.submit.validator'] ?? $this->privates['form.type_extension.submit.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension());
}, 1)), new RewindableGenerator(function () {
    yield 0 => ($this->privates['form.type_guesser.validator'] ?? $this->load('getForm_TypeGuesser_ValidatorService.php'));
    yield 1 => ($this->privates['form.type_guesser.doctrine'] ?? $this->load('getForm_TypeGuesser_DoctrineService.php'));
}, 2))), ($this->privates['form.resolved_type_factory'] ?? $this->load('getForm_ResolvedTypeFactoryService.php')));
