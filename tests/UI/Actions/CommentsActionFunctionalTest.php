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
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CommentsActionFunctionalTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class CommentsActionFunctionalTest extends WebTestCase
{
    use TestCaseTrait;

    /**
     * @group functional
     */
    public function testGetStatusCode()
    {
        $client = static::createClient();
        $client->request('GET', '/trick/2');
        static::assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

}