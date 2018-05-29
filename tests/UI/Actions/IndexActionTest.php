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
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


/**
 * Class AllTricksControllerTest
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

    /** @test */
    public function countAllTricksFromTheDatabase()
    {
        $tricks = $this->entityManager
            ->getRepository(Tricks::class)
            ->findAll();

        $this->assertCount(9, $tricks);
    }

    /** @test */
    public function databaseTrickMustBeAnInstanceOfTrickEntity() {
        $trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find(1);

        $this->assertInstanceOf(Tricks::class, $trick);

    }

    /** @test */
    public function trickMustContainsTitle() {

        $this->trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find(1);
        $this->assertContains('Japan Air', $this->trick->getName());

    }

    /** @test */
    public function trickMustContainsGroup() {

        $this->trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find(1);

        $this->assertContains('Grabs', $this->trick->getGroup()->getGroup());

    }


    protected function tearDown() {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }


}