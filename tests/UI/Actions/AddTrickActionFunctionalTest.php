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

use App\Domain\Form\Type\TrickType;
use Blackfire\Bridge\PhpUnit\TestCaseTrait;
use Blackfire\Profile\Configuration;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AddTrickActionFunctionalTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class AddTrickActionFunctionalTest extends WebTestCase
{
    use TestCaseTrait;

    /**
     * @group functional
     */
    public function testGetStatusCode()
    {
        $client = static::createClient();
        $client->request('GET', '/ajouter/figure');
        static::assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    /**
     * @group functional
     */
//    public function testAddTrickForm()
//    {
//        $client = static::createClient();
//        $crawler = $client->request('GET', '/ajouter/figure');
//        $form = $crawler->selectButton('publier')->form();
//        static::assertTrue($form);
//    }

    /**
     * @group Blackfire
     */
    public function testAddTrickInvoke()
    {
        $config = new Configuration();
        $config->assert('main.peak_memory < 100kB', 'AddImages memory usage');
        $config->assert('main.wall_time < 45ms', 'AddImages walltime');
        $config->assert('metrics.sql.queries.count = 0', 'AddImages walltime');
        $this->assertBlackfire($config, function(){
            $client = static::createClient();
            $client->request('GET', '/ajouter/figure');
        });
    }
}