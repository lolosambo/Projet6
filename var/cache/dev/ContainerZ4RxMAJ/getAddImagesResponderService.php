<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'App\UI\Responders\AddImagesResponder' shared autowired service.

include_once $this->targetDirs[3].'/src/UI/Responders/Interfaces/AddImagesResponderInterface.php';
include_once $this->targetDirs[3].'/src/UI/Responders/AddImagesResponder.php';

return $this->privates['App\UI\Responders\AddImagesResponder'] = new \App\UI\Responders\AddImagesResponder(($this->services['twig'] ?? $this->getTwigService()));
