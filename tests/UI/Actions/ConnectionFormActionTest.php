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

use App\UI\Actions\ConnectionFormAction;
use App\UI\Responders\ConnectionFormResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ConnectionFormControllerTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ConnectionFormActionTest extends WebTestCase
{
    private $container;

    private $authenticationUtils;

    private $responder;

    public function setUp()
    {
        static::bootKernel();
        $this->container = static::$kernel->getContainer();
        $this->authenticationUtils = $this->container->get('security.authentication_utils');
        $this->responder = $this->createMock(ConnectionFormResponder::class);
    }

    public function test_construct()
    {
        $action = new ConnectionFormAction();
        static::assertInstanceOf(ConnectionFormAction::class, $action);
    }

    public function test_Connection_Form_Must_Be_Showed() {

        $client = static::createClient();
        $crawler = $client->request('GET', '/connexion');
        $response = $client->getResponse();
        $content = $response->getContent();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Utilisateur', $content );
        $this->assertContains('Mot de passe', $content );
        $this->assertContains('Réinitialiser', $content );
        $this->assertContains('Se connecter', $content );

    }
}


