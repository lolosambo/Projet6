<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'App\UI\Actions\ShareVideosAction' shared autowired service.

include_once $this->targetDirs[3].'/src/UI/Actions/ShareVideosAction.php';

return $this->services['App\UI\Actions\ShareVideosAction'] = new \App\UI\Actions\ShareVideosAction(($this->privates['App\Domain\Repository\VideosRepository'] ?? $this->load('getVideosRepositoryService.php')), ($this->services['form.factory'] ?? $this->load('getForm_FactoryService.php')));
