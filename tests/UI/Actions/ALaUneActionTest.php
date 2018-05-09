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

use App\Domain\DTO\ALaUneDTO;
use App\Domain\Form\FormHandler\ALaUneTypeHandler;
use App\Domain\Repository\TricksRepository;
use App\UI\Actions\ALaUneAction;
use App\UI\Responders\ALaUneResponder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class AddTrickActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ALaUneActionTest extends WebTestCase
{

    private $container;

    private $factory;

    private $aLaUneResponder;

    private $handler;

    private $dto;


    public function setUp()
    {
        static::bootKernel();
        $this->container = static::$kernel->getContainer();
        $this->factory = $this->container->get('form.factory');
        $this->repository = $this->createMock(TricksRepository::class);
        $this->aLaUneResponder = new ALaUneResponder($this->createMock(Environment::class));
        $this->handler = $this->createMock(ALaUneTypeHandler::class);
        $this->dto = $this->createMock(ALaUneDTO::class);
    }

    public function test_construct()
    {
        $action = new ALaUneAction($this->factory);

        static::assertInstanceOf(
            ALaUneAction::class,
            $action
        );
    }

    public function test_bad_formHandler()
    {
        $request = Request::create(
            '/image_a_la_une/1',
            'POST'
        );
        $this->handler->method('handle')->willReturn(false);
        $action = new ALaUneAction($this->factory);

        static::assertInstanceOf(Response::class,
            $action(
                $request,
                $this->aLaUneResponder,
                $this->handler,
                $this->dto
            )
        );
    }

    public function test_good_formHandler()
    {
        $request = Request::create(
            '/image_a_la_une/1',
            'POST'
        );
        $this->handler->method('handle')->willReturn(true);
        $action = new ALaUneAction($this->factory);

        static::assertInstanceOf(RedirectResponse::class,
            $action(
                $request,
                $this->aLaUneResponder,
                $this->handler,
                $this->dto
            )
        );
    }
}