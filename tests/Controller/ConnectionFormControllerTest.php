<?php


namespace Tests\tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConnectionFormControllerTest extends WebTestCase
{
    public function test_Connection_Form_Must_Be_Showed() {

        $client = static::createClient();
        $crawler = $client->request('GET', '/connexion');
        $response = $client->getResponse();
        $content = $response->getContent();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Utilisateur', $content );
        $this->assertContains('Mot de passe', $content );
        $this->assertContains('Réinitialiser', $content );
        $this->assertContains('Se connecter', $content );

    }
}