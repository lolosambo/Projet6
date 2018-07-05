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

use App\Domain\Models\Users;
use Blackfire\Bridge\PhpUnit\TestCaseTrait;
use Blackfire\Profile\Configuration;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InscriptionActionFunctionalTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class InscriptionActionFunctionalTest extends WebTestCase
{
    use TestCaseTrait;

    public function setUp()
    {
        parent::setUp();
        $client = static::createClient();
        $container = $client->getContainer();
        $em = $container->get('doctrine')->getManager()->getRepository(Users::class);
        $em->createQueryBuilder('u')
            ->delete()
            ->where('u.pseudo = ?1')
            ->setParameter(1, "UserTest")
            ->getQuery()
            ->execute();
    }
    /**
     * @group functional
     */
    public function testAddTrickGetStatusCode()
    {
        $client = static::createClient();
        $client->request('GET', '/inscription');
        static::assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    /**
     * @group functional
     */
    public function testInscriptionForm()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/inscription');
        $form = $crawler->selectButton("S'inscrire")->form();
        $form['inscription[pseudo]'] = "UserTest";
        $form['inscription[password][first]'] = "passwordTest";
        $form['inscription[password][second]'] = "passwordTest";
        $form['inscription[mail]'] = "test@functionaltest.fr";
        $client->submit($form);
        $crawler = $client->followRedirect();
        static::assertSame(1, $crawler->filter('div.flash-notice')->count());
    }

    /**
     * @group Blackfire
     */
    public function testInscriptionInvokeWithoutSubmission()
    {
        $config = new Configuration();
        $config->assert('main.peak_memory < 100kB', 'AddImages memory usage');
        $config->assert('metrics.sql.queries.count = 0', 'AddImages walltime');
        $this->assertBlackfire($config, function(){
            $client = static::createClient();
            $client->request('GET', '/inscription');
        });
    }
}
