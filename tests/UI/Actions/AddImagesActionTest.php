<?php


namespace Tests\UI\Actions;


use App\Domain\DTO\ImagesDTO;
use App\Domain\Form\FormHandler\ImagesTypeHandler;
use App\UI\Actions\AddImagesAction;
use App\UI\Responders\AddedImagesResponder;
use App\UI\Responders\AddImagesResponder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AddImagesActionTest extends WebTestCase
{

    private $container;

    private $factory;

    private $addImagesResponder;

    private $addedImagesResponder;

    private $handler;

    private $dto;


    public function setUp()
    {
        static::bootKernel();
        $this->container = static::$kernel->getContainer();
        $this->factory = $this->container->get('form.factory');
        $this->addedImagesResponder = new AddedImagesResponder($this->createMock(Environment::class));
        $this->addImagesResponder = new AddImagesResponder($this->createMock(Environment::class));
        $this->handler = $this->createMock(ImagesTypeHandler::class);
        $this->dto = $this->createMock(ImagesDTO::class);
    }

    public function test_construct()
    {
        $action = new AddImagesAction($this->factory);

        static::assertInstanceOf(
            AddImagesAction::class,
            $action
        );
    }

    public function test_bad_formHandler()
    {
        $request = Request::create(
            '/ajout-medias/1',
            'POST'
        );
        $this->handler->method('handle')->willReturn(false);
        $action = new AddImagesAction($this->factory);
       ;
        static::assertInstanceOf(Response::class,
            $action(
                $request,
                $this->addedImagesResponder,
                $this->addImagesResponder,
                $this->dto,
                $this->handler
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
        $action = new AddImagesAction($this->factory);
        ;
        static::assertInstanceOf(Response::class,
            $action(
                $request,
                $this->addedImagesResponder,
                $this->addImagesResponder,
                $this->dto,
                $this->handler
            )
        );
    }
}
