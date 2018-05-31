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
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class IndexActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class IndexActionTest extends WebTestCase
{
    /**
     * @var
     */
    private $entityManager;

    /**
     * @var
     */
    private $trick;

    protected function setUp() {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testCountAllTricksFromTheDatabase()
    {
        $tricks = $this->entityManager
            ->getRepository(Tricks::class)
            ->findAll();

        $this->assertCount(30, $tricks);
    }

    public function testDatabaseTrickMustBeAnInstanceOfTrickEntity() {
        $trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find(1);

        $this->assertInstanceOf(Tricks::class, $trick);

    }

    public function testTrickMustContainsTitle() {

        $this->trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find(1);
        $this->assertContains('Figure0', $this->trick->getName());

    }

    public function testTrickMustContainsGroup() {

        $this->trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find(1);

        $this->assertInstanceOf(Groups::class, $this->trick->getGroup());

    }

    protected function tearDown() {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }
}
