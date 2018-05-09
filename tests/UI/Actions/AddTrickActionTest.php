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

use App\Domain\DTO\TrickAddDTO;
use App\Domain\Form\FormHandler\TrickTypeHandler;
use App\Domain\Repository\TricksRepository;
use App\UI\Actions\AddTrickAction;
use App\UI\Responders\AddedTrickResponder;
use App\UI\Responders\AddTrickResponder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class AddTrickActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class AddTrickActionTest extends WebTestCase
{

    private $container;

    private $factory;

    private $addTrickResponder;

    private $addedTrickResponder;

    private $handler;

    private $dto;

    private $repository;


    public function setUp()
    {
        static::bootKernel();
        $this->container = static::$kernel->getContainer();
        $this->factory = $this->container->get('form.factory');
        $this->repository = $this->createMock(TricksRepository::class);
        $this->addedTrickResponder = new AddedTrickResponder($this->createMock(Environment::class));
        $this->addTrickResponder = new AddTrickResponder($this->createMock(Environment::class));
        $this->handler = $this->createMock(TrickTypeHandler::class);
        $this->dto = $this->createMock(TrickAddDTO::class);
    }

    public function test_construct()
    {
        $action = new AddTrickAction($this->repository, $this->factory);

        static::assertInstanceOf(
            AddTrickAction::class,
            $action
        );
    }

    public function test_bad_formHandler()
    {
        $request = Request::create(
            '/ajouter/figure',
            'POST'
        );
        $this->handler->method('handle')->willReturn(false);
        $action = new AddTrickAction($this->repository, $this->factory);

        static::assertInstanceOf(Response::class,
            $action(
                $request,
                $this->addedTrickResponder,
                $this->addTrickResponder,
                $this->handler,
                $this->dto
            )
        );
    }

    public function test_good_formHandler()
    {
        $request = Request::create(
            '/ajout-medias/1',
            'POST'
        );
        $this->handler->method('handle')->willReturn(true);
        $action = new AddtrickAction($this->repository, $this->factory);
        ;
        static::assertInstanceOf(Response::class,
            $action(
                $request,
                $this->addedTrickResponder,
                $this->addTrickResponder,
                $this->handler,
                $this->dto
            )
        );
    }
}