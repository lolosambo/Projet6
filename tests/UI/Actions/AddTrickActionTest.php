<?php

declare(strict_types=1);

/*
 * This file is part of the SnowTricks project.
 *
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Tests\UI\Actions;


use App\Domain\Repository\TricksRepository;
use App\UI\Actions\AddTrickAction;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;


/**
 * Class AddTrickActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class AddTrickActionTest extends WebTestCase
{

    protected static $container;

    private $factory;

    private $repository;

    private $session;

    public function setUp()
    {
        static::bootKernel();
        self::$container = static::$kernel->getContainer();
        $this->factory = self::$container->get('form.factory');
        $this->session = new Session(new MockArraySessionStorage());
        $this->repository = $this->createMock(TricksRepository::class);
    }

    /**
     * @group unit
     */
    public function testConstruct()
    {
        $action = new AddTrickAction($this->repository, $this->factory);
        static::assertInstanceOf(
            AddTrickAction::class,
            $action
        );
    }
}

