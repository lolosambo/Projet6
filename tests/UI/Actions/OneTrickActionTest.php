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
use App\Domain\Models\Users;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


/**
 * Class OneTrickControllerTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class OneTrickActionTest extends WebTestCase
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var Tricks
     */
    private $trick;


    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel
            ->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find(1);
    }

    public function testFoundTrickMustBeAnInstanceOfTrickEntity()
    {
        $this->assertInstanceOf(Tricks::class, $this->trick);
    }

    public function testTrickMustContainsTitle()
    {
        $this->assertContains('Figure0', $this->trick->getName());
    }

    public function testTrickMustContainsGroup()
    {
        $this->assertInstanceOf(groups::class, $this->trick->getGroup());
    }

    public function testTrickMustContainsContent()
    {
        $this->assertContains('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', $this->trick->getContent());
    }

    public function testTrickMustContainsAuthor()
    {
        $this->assertInstanceOf(Users::class, $this->trick->getUser());
    }

    public function testTrickMustContainsUpdateDate()
    {
        $this->assertInstanceOf(\DateTime::class, $this->trick->getTrickDate());
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
