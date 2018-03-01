<?php

namespace Tests\tests\Controller;

use App\Controller\AllTricksController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class AllTricksControllerTest extends WebTestCase {

    public function test_All_Tricks_Must_Be_Showed() {

        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $response = $client->getResponse();
        $responseContent = $response->getContent();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('slide', $responseContent );



    }


}