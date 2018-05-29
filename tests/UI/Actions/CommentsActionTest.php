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

use App\Domain\Form\FormHandler\CommentTypeHandler;
use App\Domain\Repository\CommentsRepository;
use App\UI\Actions\CommentsAction;
use App\UI\Responders\CommentsResponder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class AddTrickActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class CommentsActionTest extends WebTestCase
{

    private $container;

    private $factory;

    private $commentResponder;

    private $handler;

    private $session;

    private $request;

    public function setUp()
    {
        static::bootKernel();
        $this->container = static::$kernel->getContainer();
        $this->factory = $this->container->get('form.factory');
        $this->session = $this->container->get('session');
        $this->repository = $this->createMock(CommentsRepository::class);
        $this->commentResponder = new CommentsResponder($this->createMock(Environment::class));
        $this->handler = $this->createMock(CommentTypeHandler::class);
        $this->request = Request::create(
            '/trick/1',
            'GET'
        );
    }

    public function test_construct()
    {
        $action = new CommentsAction($this->factory, $this->session);

        static::assertInstanceOf(
            CommentsAction::class,
            $action
        );
    }

    public function test_no_formHandler()
    {

        $action = new CommentsAction($this->factory, $this->session);
        $result = $action->getComments($this->request, $this->handler, $this->commentResponder);

        static::assertNull($result);
    }

    public function test_bad_formHandler()
    {
        $this->handler->method('handle')->willReturn(false);
        $this->session->set('userId', 1);
        $action = new CommentsAction($this->factory, $this->session);
        $result = $action->getComments($this->request, $this->handler, $this->commentResponder);

        static::assertInstanceOf(\Exception::class,
            $result
        );
    }

    public function test_good_formHandler()
    {
        $this->handler->method('handle')->willReturn(true);
        $this->session->set('userId', 1);
        $action = new CommentsAction($this->factory, $this->session);
        $result = $action->getComments($this->request, $this->handler, $this->commentResponder);
        static::assertInstanceOf(Response::class,
            $result
        );
    }
}
