<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'service_locator.mOienZy' shared service.

return $this->privates['service_locator.mOienZy'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array('addVideoResponder' => function () {
    return ($this->privates['App\UI\Responders\AddVideoResponder'] ?? $this->load('getAddVideoResponderService.php'));
}, 'addedVideoResponder' => function () {
    return ($this->privates['App\UI\Responders\AddedVideoResponder'] ?? $this->load('getAddedVideoResponderService.php'));
}, 'dto' => function () {
    return ($this->privates['App\Domain\DTO\VideosDTO'] ?? $this->privates['App\Domain\DTO\VideosDTO'] = new \App\Domain\DTO\VideosDTO());
}, 'mediaHandler' => function () {
    return ($this->privates['App\Domain\Form\FormHandler\VideosTypeHandler'] ?? $this->load('getVideosTypeHandlerService.php'));
}));
