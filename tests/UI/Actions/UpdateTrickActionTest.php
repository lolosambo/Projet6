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

use App\Domain\Form\FormHandler\UpdateTrickTypeHandler;
use App\Domain\Models\Tricks;
use App\UI\Actions\UpdatetrickAction;
use App\UI\Responders\UpdatedTrickResponder;
use App\UI\Responders\UpdateTrickResponder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ShareVideosActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class UpdateTrickActionTest extends WebTestCase
{
    protected static $container;

    private $factory;

    private $handler;

    private $trick;

    private $updatedTrickResponder;

    private $updateTrickResponder;

    public function setUp()
    {
        static::bootKernel();
        self::$container = static::$kernel->getContainer();
        $this->factory = self::$container->get('form.factory');
        $this->handler = $this->createMock(UpdateTrickTypeHandler::class);
        $this->trick = $this->createMock(Tricks::class);
        $this->updatedTrickResponder = new UpdatedTrickResponder($this->createMock(Environment::class));
        $this->updateTrickResponder = new UpdateTrickResponder($this->createMock(Environment::class));
    }

    public function test_construct()
    {
        $action = new UpdateTrickAction($this->factory);
        static::assertInstanceOf(UpdateTrickAction::class, $action);
    }

    public function test_update_trick_action_ok()
    {
        $request = Request::create(
            '/modifier/figure/2',
            'POST'
        );

        $this->handler->method('handle')->willReturn(true);
        $action = new UpdateTrickAction($this->factory);

        static::assertInstanceOf(
            Response::class,
            $action
            (
                $request,
                $this->trick,
                $this->handler,
                $this->updateTrickResponder,
                $this->updatedTrickResponder
            )
        );
    }

    public function test_non_updated_trick_action_()
    {
        $request = Request::create(
            '/modifier/figure/2',
            'POST'
        );

        $this->handler->method('handle')->willReturn(false);
        $action = new UpdateTrickAction($this->factory);
        static::assertInstanceOf(
            Response::class,
            $action
            (
                $request,
                $this->trick,
                $this->handler,
                $this->updateTrickResponder,
                $this->updatedTrickResponder
            )
        );
    }
}