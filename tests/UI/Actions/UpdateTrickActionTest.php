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
use Blackfire\Bridge\PhpUnit\TestCaseTrait;
use Blackfire\Client;
use Blackfire\Profile\Configuration;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ShareVideosActionBlackfireTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class UpdateTrickActionTest extends WebTestCase
{

    use TestCaseTrait;

    private $action;

    private $blackfireClient;

    private $config;

    protected static $container;

    private $factory;

    private $handler;

    private $trick;

    private $updateTrickResponder;

    public function setUp()
    {
        static::bootKernel();
        self::$container = static::$kernel->getContainer();
        $this->factory = self::$container->get('form.factory');
        $this->handler = $this->createMock(UpdateTrickTypeHandler::class);
        $this->trick = $this->createMock(Tricks::class);
        $this->updateTrickResponder = new UpdateTrickResponder($this->createMock(Environment::class));
        $this->blackfireClient = new Client();
        $this->config = new Configuration();
        $this->action = new UpdateTrickAction($this->factory);
    }

    public function testConstruct()
    {
        $action = new UpdateTrickAction($this->factory);
        static::assertInstanceOf(UpdateTrickAction::class, $action);
    }

    /**
     * @group Blackfire
     */
    public function testUpdateTrickActionOk()
    {
        $request = Request::create('/modifier/figure/2', 'POST');
        $this->handler->method('handle')->willReturn(true);
        $probe = $this->blackfireClient->createProbe($this->config);
        $action = $this->action;
        $action(
            $request,
            $this->trick,
            $this->handler,
            $this->updateTrickResponder
        );
        $this->blackfireClient->endProbe($probe);

        static::assertInstanceOf(
            Response::class,
            $action
            (
                $request,
                $this->trick,
                $this->handler,
                $this->updateTrickResponder
            )
        );
    }

    /**
     * @group Blackfire
     */
    public function testNonUpdatedTrickAction()
    {
        $request = Request::create('/modifier/figure/2', 'POST');
        $this->handler->method('handle')->willReturn(false);
        $probe = $this->blackfireClient->createProbe($this->config);
        $action = $this->action;
        $action(
            $request,
            $this->trick,
            $this->handler,
            $this->updateTrickResponder
        );
        $this->blackfireClient->endProbe($probe);
        static::assertInstanceOf(
            Response::class,
            $action
            (
                $request,
                $this->trick,
                $this->handler,
                $this->updateTrickResponder
            )
        );
    }
}