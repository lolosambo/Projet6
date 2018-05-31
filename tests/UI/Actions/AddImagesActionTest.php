<?php


namespace Tests\UI\Actions;

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

    /**
     * @var
     */
    protected static $container;

    /**
     * @var
     */
    private $factory;

    /**
     * @var
     */
    private $addImagesResponder;

    /**
     * @var
     */
    private $addedImagesResponder;

    /**
     * @var
     */
    private $handler;


    public function setUp()
    {
        static::bootKernel();
        self::$container = static::$kernel->getContainer();
        $this->factory = self::$container->get('form.factory');
        $this->addedImagesResponder = new AddedImagesResponder($this->createMock(Environment::class));
        $this->addImagesResponder = new AddImagesResponder($this->createMock(Environment::class));
        $this->handler = $this->createMock(ImagesTypeHandler::class);
    }

    public function testConstruct()
    {
        $action = new AddImagesAction($this->factory);

        static::assertInstanceOf(
            AddImagesAction::class,
            $action
        );
    }

    public function testBadFormHandler()
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
                $this->handler
            )
        );
    }

    public function testGoodFormHandler()
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
                $this->handler
            )
        );
    }
}


