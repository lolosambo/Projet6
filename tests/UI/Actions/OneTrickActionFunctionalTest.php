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
 * Class OneTrickActionFunctionalTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class OneTrickActionFunctionalTest extends WebTestCase
{
    use TestCaseTrait;

    /**
     * @group functional
     */
    public function testGetStatusCode()
    {
        $client = static::createClient();
        $client->request('GET', '/trick/Figure_0');
        static::assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    /**
     * @group Blackfire
     */
    public function testOneTrickInvoke()
    {
        $config = new Configuration();
        $config->assert('main.peak_memory < 100kB', 'AddImages memory usage');
        $config->assert('main.wall_time < 45ms', 'AddImages walltime');
        $config->assert('metrics.sql.queries.count = 0', 'AddImages walltime');
        $this->assertBlackfire($config, function(){
            $client = static::createClient();
            $client->request('GET', '/trick/Figure_0');
        });
    }
}