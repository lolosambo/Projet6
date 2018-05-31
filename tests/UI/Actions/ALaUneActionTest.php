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

use App\Domain\Form\FormHandler\ALaUneTypeHandler;
use App\UI\Actions\ALaUneAction;
use App\UI\Responders\ALaUneResponder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Twig\Environment;

/**
 * Class AddTrickActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ALaUneActionTest extends WebTestCase
{

    protected static $container;

    private $factory;

    private $aLaUneResponder;

    private $handler;

    private $generator;

    public function setUp()
    {
        static::bootKernel();
        self::$container = static::$kernel->getContainer();
        $this->factory = self::$container->get('form.factory');
        $this->aLaUneResponder = new ALaUneResponder($this->createMock(Environment::class));
        $this->handler = $this->createMock(ALaUneTypeHandler::class);
        $this->generator = $this->createMock(UrlGenerator::class);
    }

    public function testConstruct()
    {
        $action = new ALaUneAction($this->factory);
        static::assertInstanceOf(
            ALaUneAction::class,
            $action
        );
    }

    public function testBadFormHandler()
    {
        $request = Request::create(
            '/image_a_la_une/1',
            'POST'
        );
        $this->handler->method('handle')->willReturn(false);
        $this->generator->method('generate')->willReturn('homepage');
        $action = new ALaUneAction($this->factory);

        static::assertInstanceOf(Response::class,
            $action(
                $request,
                $this->aLaUneResponder,
                $this->handler,
                $this->generator
            )
        );
    }

    public function testGoodFormHandler()
    {
        $request = Request::create(
            '/image_a_la_une/1',
            'POST'
        );
        $this->handler->method('handle')->willReturn(true);
        $this->generator->method('generate')->willReturn('homepage');
        $action = new ALaUneAction($this->factory);

        static::assertInstanceOf(RedirectResponse::class,
            $action(
                $request,
                $this->aLaUneResponder,
                $this->handler,
                $this->generator
            )
        );
    }
}
