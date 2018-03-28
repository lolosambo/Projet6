<?php


namespace Tests\Controller;

use App\Entity\Tricks;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AllTricksControllerTest extends WebTestCase
{

    private $entityManager;
    private $trick;


    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    /** @test */
    public function home_page_must_be_displayed() {

        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }

    /** @test */
    public function count_all_tricks_from_the_database()
    {
        $tricks = $this->entityManager
            ->getRepository(Tricks::class)
            ->findAll();

        $this->assertCount(9, $tricks);
    }

    /** @test */
    public function database_trick_must_be_an_instance_of_Trick_Entity() {
        $trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find(1);

        $this->assertInstanceOf(Tricks::class, $trick);

    }

    /** @test */
    public function trick_must_contains_title() {

        $this->trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find(1);
        $this->assertContains('Japan Air', $this->trick->getName());

    }

    /** @test */
    public function trick_must_contains_group() {

        $this->trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find(1);

        $this->assertContains('Grabs', $this->trick->getGroup()->getGroup());

    }




    protected function tearDown()
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }


}