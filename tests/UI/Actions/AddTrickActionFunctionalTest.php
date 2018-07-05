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

use App\Domain\Models\Tricks;
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

    public function setUp()
    {
        parent::setUp();
        $client = static::createClient();
        $container = $client->getContainer();
        $em = $container->get('doctrine')->getManager()->getRepository(Tricks::class);
        $em->createQueryBuilder('t')
            ->delete()
            ->where('t.name = ?1')
            ->setParameter(1, "Figure Test")
            ->getQuery()
            ->execute();
    }

    /**
     * @group functional
     */
    public function testAddTrickGetStatusCode()
    {
        $client = static::createClient();
        $session = $client->getContainer()->get('session');
        $session->set('pseudo', 'User1');
        $client->request('GET', '/ajouter/figure');
        static::assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    /**
     * @group functional
     */
    public function testAddTrickForm()
    {
        $client = static::createClient();
        $session = $client->getContainer()->get('session');
        $session->set('pseudo', 'User1');
        $crawler = $client->request('GET', '/ajouter/figure');
        $form = $crawler->filter('#publier')->form();

        $form['trick[name]'] = "Figure Test";
        $form['trick[group]']->select("4da59cab-007b-4dd0-a65e-91d842565121");
        $form['trick[content]'] = "Some description";
        $form['trick[address1]'] = "https://www.youtube.com/embed/RIN7A6zYKm4";
        $form['trick[address2]'] = "https://www.youtube.com/embed/RIN7A6zYKm4";
        $form['trick[address3]'] = "https://www.dailymotion.com/embed/video/x6nex7u";
        $form['trick[address4]'] = "https://www.dailymotion.com/embed/video/x6nex7u";
        $crawler = $client->submit($form);

        $crawler = $client->followRedirect();
        static::assertSame(1, $crawler->filter('div.flash-notice')->count());
    }

    /**
     * @group Blackfire
     */
    public function testAddTrickInvoke()
    {
        $config = new Configuration();
        $config->assert('main.peak_memory < 100kB', 'AddImages memory usage');
        $config->assert('metrics.sql.queries.count = 0', 'AddImages walltime');
        $this->assertBlackfire($config, function(){
            $client = static::createClient();
            $client->request('GET', '/ajouter/figure');
        });
    }


}