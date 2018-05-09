<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'doctrine.dbal.default_connection' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/doctrine-bridge/Logger/DbalLogger.php';
include_once $this->targetDirs[3].'/vendor/doctrine/dbal/lib/Doctrine/DBAL/Logging/LoggerChain.php';
include_once $this->targetDirs[3].'/vendor/doctrine/dbal/lib/Doctrine/DBAL/Configuration.php';
include_once $this->targetDirs[3].'/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/AttachEntityListenersListener.php';
include_once $this->targetDirs[3].'/vendor/doctrine/common/lib/Doctrine/Common/EventManager.php';
include_once $this->targetDirs[3].'/vendor/symfony/doctrine-bridge/ContainerAwareEventManager.php';
include_once $this->targetDirs[3].'/vendor/doctrine/doctrine-bundle/ConnectionFactory.php';
include_once $this->targetDirs[3].'/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/Connection.php';
include_once $this->targetDirs[3].'/vendor/doctrine/dbal/lib/Doctrine/DBAL/Connection.php';

$a = new \Symfony\Bridge\Monolog\Logger('doctrine');
$a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->privates['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor()));
$a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

$b = new \Doctrine\DBAL\Logging\LoggerChain();
$b->addLogger(new \Symfony\Bridge\Doctrine\Logger\DbalLogger($a, ($this->privates['debug.stopwatch'] ?? $this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))));
$b->addLogger(($this->privates['doctrine.dbal.logger.profiling.default'] ?? $this->privates['doctrine.dbal.logger.profiling.default'] = new \Doctrine\DBAL\Logging\DebugStack()));

$c = new \Doctrine\DBAL\Configuration();
$c->setSQLLogger($b);

$d = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this);
$d->addEventListener(array(0 => 'loadClassMetadata'), new \Doctrine\ORM\Tools\AttachEntityListenersListener());

return $this->services['doctrine.dbal.default_connection'] = (new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory(array()))->createConnection(array('driver' => $this->getEnv('DB_DRIVER_DEV'), 'charset' => $this->getEnv('DB_CHARSET_DEV'), 'url' => $this->getEnv('resolve:DATABASE_URL_DEV'), 'host' => 'localhost', 'port' => NULL, 'user' => 'root', 'password' => NULL, 'driverOptions' => array(), 'serverVersion' => $this->getEnv('DB_VERSION_DEV'), 'defaultTableOptions' => array()), $c, $d, array());
