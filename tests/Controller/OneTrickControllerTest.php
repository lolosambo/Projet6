<?php


namespace Tests\Controller;

use App\Entity\Tricks;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OneTrickControllerTest extends WebTestCase
{

    private $entityManager;
    private $trick;


    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->trick = $this->entityManager
            ->getRepository(Tricks::class)
            ->find(1);
    }

    /** @test */
    public function single_trick_page_must_be_displayed() {

        $client = static::createClient();

        $client->request('GET', '/trick/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }

    /** @test */
    public function found_trick_must_be_an_instance_of_trick_entity()
    {

        $this->assertInstanceOf(Tricks::class, $this->trick);

    }

    /** @test */
    public function trick_must_contains_title() {

        $this->assertContains('Japan Air', $this->trick->getName());

    }

    /** @test */
    public function trick_must_contains_group() {

        $this->assertContains('Grabs', $this->trick->getGroup()->getGroup());

    }

    /** @test */
    public function trick_must_contains_content() {

        $this->assertContains('japan ou japan air : saisie de l\'avant de la planche', $this->trick->getContent());

    }

    /** @test */
    public function trick_must_contains_author() {

        $this->assertContains('test2', $this->trick->getUser()->getPseudo());

    }

    /** @test */
    public function trick_must_contains_update_date() {

        $this->assertInstanceOf(\DateTime::class, $this->trick->getTrickDate());
        $date = $this->trick->getTrickDate();
        $formated_date = $date->format('Y-m-d H:i:s');
        $this->assertEquals('2018-01-09 06:31:24', $formated_date);

    }

    protected function tearDown()
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }


}