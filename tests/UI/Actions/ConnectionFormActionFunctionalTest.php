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

use Blackfire\Bridge\PhpUnit\TestCaseTrait;
use Blackfire\Profile\Configuration;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ConnectionActionFunctionalTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ConnectionActionFunctionalTest extends WebTestCase
{
    use TestCaseTrait;

    /**
     * @group functional
     */
    public function testGetStatusCode()
    {
        $client = static::createClient();
        $client->request('GET', '/connexion');
        static::assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    /**
     * @group functional
     */
    public function testConnectionForm()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/connexion');
        $form = $crawler->selectButton("Valider")->form();
        $form['pseudo'] = "User1";
        $form['password'] = "MySuperPassword";
        $crawler = $client->submit($form);
        $crawler = $client->followRedirect();
        static::assertSame(1, $crawler->filter('h3:contains("Bonjour User1")')->count());
    }

    /**
     * @group Blackfire
     */
    public function testConnexionInvokeWithoutSubmission()
    {
        $config = new Configuration();
        $config->assert('main.peak_memory < 100kB', 'AddImages memory usage');
        $config->assert('main.wall_time < 45ms', 'AddImages walltime');
        $config->assert('metrics.sql.queries.count = 0', 'AddImages walltime');
        $this->assertBlackfire($config, function(){
            $client = static::createClient();
            $client->request('GET', '/connexion');
        });
    }
}