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

use App\Domain\Form\FormHandler\InscriptionTypeHandler;
use App\UI\Actions\InscriptionFormAction;
use App\UI\Responders\InscriptionFormResponder;
use App\UI\Responders\InscriptionStatusResponder;
use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class InscriptionFormActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class InscriptionFormActionTest extends WebTestCase
{

    private $container;

    private $factory;

    private $handler;

    private $inscriptionStatusResponder;

    private $inscriptionFormResponder;

    private $twig;

    public function setUp()
    {
        static::bootKernel();
        $this->container = static::$kernel->getContainer();
        $this->factory = $this->container->get('form.factory');
        $this->inscriptionStatusResponder = new InscriptionStatusResponder($this->createMock(Environment::class));
        $this->inscriptionFormResponder = new InscriptionFormResponder($this->createMock(Environment::class));
        $this->handler = $this->createMock(InscriptionTypeHandler::class);
        $this->twig = $this->createMock(Environment::class);
    }

    public function test_construct()
    {
        $action = new InscriptionFormAction($this->factory, $this->twig);
        static::assertInstanceOf(InscriptionFormAction::class, $action);
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function test_inscription_action()
    {
        $request= Request::create(
            '/inscription',
            'POST'
        );

        $this->handler->method('handle')->willReturn(true);
        $action = new InscriptionFormAction(
            $this->factory,
            $this->twig
        );
        $result = $action(
            $request,
            $this->handler,
            $this->createMock(Swift_Mailer::class),
            $this->inscriptionStatusResponder,
            $this->inscriptionFormResponder
        );

        static::assertInstanceOf(Response::class, $result);
    }
}
