<?php


namespace Tests\UI\Actions;

use App\Domain\Form\FormHandler\ImagesTypeHandler;
use App\Domain\Form\FormHandler\Interfaces\ImagesTypeHandlerInterface;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\Domain\Repository\TricksRepository;
use App\UI\Actions\AddImagesAction;
use App\UI\Responders\AddedImagesResponder;
use App\UI\Responders\AddImagesResponder;
use Blackfire\Bridge\PhpUnit\TestCaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class AddImagesActionTest extends WebTestCase
{
    use TestCaseTrait;

    protected static $container;

    private $factory;

    private $addImagesResponder;

    private $handler;

    private $imagesRepository;

    /**
     * @var
     */
    private $urlGenerator;


    public function setUp()
    {
        static::bootKernel();
        self::$container = static::$kernel->getContainer();
        $this->factory = self::$container->get('form.factory');
        $this->imagesRepository = $this->createMock(ImagesRepositoryInterface::class);
        $this->addImagesResponder = new AddImagesResponder($this->createMock(Environment::class));
        $this->urlGenerator = $this->createMock( UrlGeneratorInterface::class);
        $this->handler = $this->createMock( ImagesTypeHandlerInterface::class);
    }

    /**
     * @group unit
     */
    public function testConstruct()
    {
        $action = new AddImagesAction($this->factory);

        static::assertInstanceOf(
            AddImagesAction::class,
            $action
        );
    }

    /**
     * @group Blackfire
     */
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
                $this->urlGenerator,
                $this->addImagesResponder,
                $this->handler
            )
        );
    }

    /**
     * @group Blackfire
     */
    public function testGoodFormHandler()
    {
        $request = Request::create(
            '/ajout-medias/1',
            'POST'
        );
        $this->handler->method('handle')->willReturn(true);
        $probe = static::$blackfire->createProbe();
        $action = new AddImagesAction($this->factory);
        static::$blackfire->endProbe($probe);
        static::assertInstanceOf(Response::class,
            $action(
                $request,
                $this->urlGenerator,
                $this->addImagesResponder,
                $this->handler
            )
        );
    }
}


