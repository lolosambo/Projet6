<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'App\Domain\Form\FormHandler\TrickTypeHandler' shared autowired service.

include_once $this->targetDirs[3].'/src/Domain/Form/FormHandler/Interfaces/TrickAddTypeHandlerInterface.php';
include_once $this->targetDirs[3].'/src/Domain/Form/FormHandler/TrickTypeHandler.php';

return $this->privates['App\Domain\Form\FormHandler\TrickTypeHandler'] = new \App\Domain\Form\FormHandler\TrickTypeHandler(($this->services['session'] ?? $this->load('getSessionService.php')), ($this->privates['App\Domain\Repository\TricksRepository'] ?? $this->load('getTricksRepositoryService.php')), ($this->privates['App\Domain\Repository\GroupsRepository'] ?? $this->load('getGroupsRepositoryService.php')), ($this->privates['App\Domain\Repository\UsersRepository'] ?? $this->load('getUsersRepositoryService.php')));
