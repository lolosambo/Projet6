<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\UI\Actions\IndexAction' shared autowired service.

include_once $this->targetDirs[3].'/src/UI/Actions/Interfaces/IndexActionInterface.php';
include_once $this->targetDirs[3].'/src/UI/Actions/IndexAction.php';

return $this->services['App\UI\Actions\IndexAction'] = new \App\UI\Actions\IndexAction(($this->privates['App\Domain\Repository\TricksRepository'] ?? $this->load('getTricksRepositoryService.php')));
