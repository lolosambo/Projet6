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
 * Class ALaUneActionFunctionalTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ALaUneActionFunctionalTest extends WebTestCase
{
    use TestCaseTrait;

    /**
     * @group functional
     */
    public function testALaUneImage()
    {
        $client = static::createClient();
        $session = $client->getContainer()->get('session');
        $session->set('pseudo', 'User1');
        $crawler = $client->request('GET', '/trick/Figure_27');
        $link = $crawler->filter('#une9164ad23-743d-4cda-9d28-553ad55773aa')->link();
        $crawler = $client->click($link);
        $crawler = $client->followRedirect();
        static::assertSame(1, $crawler->filter('div.flash-notice')->count());
    }
    /**
     * @group functional
     */
    public function testALaUneGetStatusCode()
    {
        $client = static::createClient();
        $client->request('GET', '/trick/Figure_27/image_a_la_une/9164ad23-743d-4cda-9d28-553ad55773aa');
        static::assertSame(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());
    }

    /**
     * @group Blackfire
     */
    public function testALaUneInvoke()
    {
        $config = new Configuration();
        $config->assert('main.peak_memory < 100kB', 'AddImages memory usage');
        $config->assert('metrics.sql.queries.count = 0', 'AddImages walltime');
        $this->assertBlackfire($config, function(){
            $client = static::createClient();
            $client->request('POST', '/trick/Figure_0/image_a_la_une/9164ad23-743d-4cda-9d28-553ad55773aa');
        });
    }
}