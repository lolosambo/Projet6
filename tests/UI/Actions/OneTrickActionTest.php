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

use App\Domain\Models\Tricks;
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


    protected function setUp() {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel
            ->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find(1);
    }

    /** @test */
    public function foundTrickMustBeAnInstanceOfTrickEntity() {

        $this->assertInstanceOf(Tricks::class, $this->trick);

    }

    /** @test */
    public function trickMustContainsTitle() {

        $this->assertContains('Figure0', $this->trick->getName());

    }

    /** @test */
    public function trickMustContainsGroup() {

        $this->assertContains('Groupe 3', $this->trick->getGroup()->getName());

    }

    /** @test */
    public function trickMustContainsContent() {

        $this->assertContains('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', $this->trick->getContent());

    }

    /** @test */
    public function trickMustContainsAuthor() {

        $this->assertContains('User', $this->trick->getUser()->getPseudo());

    }

    /** @test */
    public function trickMustContainsUpdateDate() {

        $this->assertInstanceOf(\DateTime::class, $this->trick->getTrickDate());
        $date = $this->trick->getTrickDate();
        $formated_date = $date->format('Y-m-d H:i:s');
        $this->assertEquals('2018-07-03 07:40:49', $formated_date);

    }

    protected function tearDown() {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }
}
