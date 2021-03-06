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
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Twig\Environment;

/**
 * Class ConnectionFormControllerTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ConnectionFormActionTest extends WebTestCase
{
    protected static $container;

    private $authenticationUtils;

    private $responder;

    public function setUp()
    {
        static::bootKernel();
        self::$container = static::$kernel->getContainer();
        $this->authenticationUtils = self::$container->get('security.authentication_utils');
        $this->responder = new ConnectionFormResponder($this->createMock(Environment::class));
    }

    /**
     * @group unit
     */
    public function testConstruct()
    {
        $action = new ConnectionFormAction();
        static::assertInstanceOf(ConnectionFormAction::class, $action);
    }

    /**
     * @group unit
     */
    public function testConnectionFormMustBeShowed() {

        $client = static::createClient();
        $crawler = $client->request('GET', '/connexion');
        $response = $client->getResponse();
        $content = $response->getContent();

        $this->assertContains('Pseudo', $content );
    }
}


