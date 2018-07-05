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
 * Class AddImagesActionFunctionalTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class AddImagesActionFunctionalTest extends WebTestCase
{
    use TestCaseTrait;

    /**
     * @group functional
     */
    public function testAddImagesGetStatusCode()
    {
        $client = static::createClient();
        $client->request('GET', '/ajout-medias/Figure_27');
        static::assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    /**
     * @group functional
     */
    public function testAddImagesForm()
    {
        $client = static::createClient();
        $session = $client->getContainer()->get('session');
        $session->set('pseudo', 'User1');
        $crawler = $client->request('GET', '/ajout-medias/Figure_27');
        $form = $crawler->filter('#publier')->form();
        foreach($form['images[image]'] as $image) {
            $image = "exemple.png";
        }
        $crawler = $client->submit($form);
        $crawler = $client->followRedirect();
        static::assertSame(1, $crawler->filter('div.flash-notice')->count());
    }

    /**
     * @group Blackfire
     */
    public function testAddImagesInvoke()
    {
        $config = new Configuration();
        $config->assert('main.peak_memory < 100kB', 'AddImages memory usage');
        $config->assert('main.wall_time < 45ms', 'AddImages walltime');
        $config->assert('metrics.sql.queries.count = 0', 'AddImages walltime');
        $this->assertBlackfire($config, function(){
            $client = static::createClient();
            $client->request('GET', '/ajout-medias/2');

        });
    }
}

