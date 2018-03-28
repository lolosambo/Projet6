<?php


namespace Tests\Controller;


use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConnectionStatusControllerTest extends WebTestCase
{

    private $em;


    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->em = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }


    /** @test */
    public function an_instance_of_Users_entity_must_be_created_after_success_login() {


        $foundUser = $this->em->getRepository('App\Entity\Users')->find(1);

        $this->assertContains('lolosambo', $foundUser->getPseudo());
    }



    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null;
    }

}