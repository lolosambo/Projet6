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

use App\Domain\Form\FormHandler\VideosTypeHandler;
use App\Domain\Repository\VideosRepository;
use App\UI\Actions\ShareVideosAction;
use App\UI\Responders\AddedVideoResponder;
use App\UI\Responders\AddVideoResponder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ShareVideosActionBlackfireTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ShareVideosActionTest extends WebTestCase
{
    protected static $container;

    private $repository;

    private $factory;

    private $handler;

    private $addedVideoResponder;

    private $addVideoResponder;

    public function setUp()
    {
        static::bootKernel();
        self::$container = static::$kernel->getContainer();
        $this->factory = self::$container->get('form.factory');
        $this->repository = $this->createMock(VideosRepository::class);
        $this->handler = $this->createMock(VideosTypeHandler::class);
        $this->addedVideoResponder = new AddedVideoResponder($this->createMock(Environment::class));
        $this->addVideoResponder = new AddVideoResponder($this->createMock(Environment::class));
    }

    public function testConstruct()
    {
        $action = new ShareVideosAction($this->repository, $this->factory);
        static::assertInstanceOf(ShareVideosAction::class, $action);
    }

    public function testSharedVideosActionOk()
    {
        $request = Request::create(
            '/ajout-videos/2',
            'POST'
        );

        $this->handler->method('handle')->willReturn(true);
        $action = new ShareVideosAction($this->repository, $this->factory);

        static::assertInstanceOf(
            Response::class,
            $action
                (
                    $request,
                    $this->handler,
                    $this->addedVideoResponder,
                    $this->addVideoResponder
                )
        );
    }

    public function testNoPostedSharedVideosAction()
    {
        $request = Request::create(
            '/ajout-videos/2',
            'POST'
        );

        $this->handler->method('handle')->willReturn(false);
        $action = new ShareVideosAction($this->repository, $this->factory);
        static::assertInstanceOf(
            Response::class,
            $action
            (
                $request,
                $this->handler,
                $this->addedVideoResponder,
                $this->addVideoResponder
            )
        );
    }
}

