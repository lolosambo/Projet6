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

use App\Domain\Models\Groups;
use App\Domain\Models\Tricks;
use App\Domain\Repository\TricksRepository;
use App\UI\Actions\IndexAction;
use App\UI\Responders\IndexResponder;
use Blackfire\Bridge\PhpUnit\TestCaseTrait;
use Blackfire\Client;
use Blackfire\Profile\Configuration;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Twig\Environment;

/**
 * Class IndexActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class IndexActionTest extends WebTestCase
{
    use TestCaseTrait;

    private $action;

    private $blackfireClient;

    private $config;

    private $entityManager;

    private $trick;

    private $responder;

    protected function setUp()
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
        $this->blackfireClient = new Client();
        $this->config = new Configuration();
        $this->action = new IndexAction($this->createMock(TricksRepository::class));
        $this->responder = new IndexResponder($this->createMock(Environment::class));
    }
    /**
     * @group unit
     */
    public function testCountAllTricksFromTheDatabase()
    {
        $tricks = $this->entityManager
            ->getRepository(Tricks::class)
            ->findAll();

        $this->assertCount(31, $tricks);
    }

    /**
     * @group unit
     */
    public function testDatabaseTrickMustBeAnInstanceOfTrickEntity()
    {
        $trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find('7be62c85-8da9-4422-bb4f-828ef119abe5');

        $this->assertInstanceOf(Tricks::class, $trick);
    }

    /**
     * @group unit
     */
    public function testTrickMustContainsTitle()
    {
        $this->trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find('7be62c85-8da9-4422-bb4f-828ef119abe5');
        $this->assertContains('Figure 0', $this->trick->getName());
    }

    /**
     * @group unit
     */
    public function testTrickMustContainsGroup()
    {
        $this->trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find('7be62c85-8da9-4422-bb4f-828ef119abe5');
        $this->assertInstanceOf(Groups::class, $this->trick->getGroup());
    }

    /**
     * @group Blackfire
     */
    public function testIndexInvoke()
    {
        $config = new Configuration();
//        $config->setMetadata('skip_metadata', 'false');
        $config->assert('main.peak_memory < 100kB', 'Homepage memory usage');
        $config->assert('main.wall_time < 45ms', 'Homepage walltime');
        $this->assertBlackfire($config, function(){
            $client = static::createClient();
            $client->request('GET', '/');
        });
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
