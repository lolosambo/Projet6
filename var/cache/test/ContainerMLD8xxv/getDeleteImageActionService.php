<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\UI\Actions\DeleteImageAction' shared autowired service.

include_once $this->targetDirs[3].'/src/UI/Actions/Interfaces/DeleteImageActionInterface.php';
include_once $this->targetDirs[3].'/src/UI/Actions/DeleteImageAction.php';

return $this->services['App\UI\Actions\DeleteImageAction'] = new \App\UI\Actions\DeleteImageAction(($this->privates['App\Domain\Repository\ImagesRepository'] ?? $this->load('getImagesRepositoryService.php')));
