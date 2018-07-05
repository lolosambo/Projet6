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

use App\Domain\Models\Videos;
use App\Domain\Models\Tricks;
use Blackfire\Bridge\PhpUnit\TestCaseTrait;
use Blackfire\Profile\Configuration;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DeleteImageActionFunctionalTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class DeleteVideoActionFunctionalTest extends WebTestCase
{
    use TestCaseTrait;

    private $client;

    private $em;

    private $video;

    public function setUp()
    {
        parent::setUp();
        $this->client = static::createClient();
        $this->em = $this->client->getContainer()->get('doctrine')->getManager();
        $repository = $this->em->getRepository(Tricks::class);
        $trick = $repository->createQueryBuilder('t')
            ->where('t.id = ?1')
            ->setParameter(1, "9687e2bd-3fa3-4cce-90fc-a3146f3ac3e1")
            ->getQuery()
            ->getOneOrNullResult();
        $this->video = new Videos();
        $this->video->setUrl('https://www.youtube.com/embed/5T-p6Ugv6TQ');
        $this->video->setTrick($trick);
        $repository->save($this->video);
        $repository = $this->em->getRepository(Videos::class);
        $this->video = $repository->createQueryBuilder('v')
            ->where('v.url = ?1')
            ->setParameter(1, 'https://www.youtube.com/embed/5T-p6Ugv6TQ')
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @group functional
     */
    public function testDeleteVideoGetStatusCode()
    {
        $uuid=$this->video->getId()->toString();
        $this->client->request('GET', '/supprimer/trick/Figure_27/videos/'.$uuid);
        static::assertEquals(Response::HTTP_FOUND, $this->client->getResponse()->getStatusCode());
    }

    /**
     * @group functional
     */
    public function testDeleteVideoFunctional()
    {
        $session = $this->client->getContainer()->get('session');
        $session->set('pseudo', 'User1');
        $crawler = $this->client->request('GET', '/trick/Figure_27');
        $link = $crawler->filter('#remove'.$this->video->getId())->link();
        $crawler = $this->client->click($link);
        $crawler = $this->client->followRedirect();
        static::assertSame(1, $crawler->filter('div.flash-notice')->count());
    }

    /**
     * @group Blackfire
     */
    public function testDeleteVideoInvoke()
    {
        $config = new Configuration();
        $config->assert('main.peak_memory < 100kB', 'AddImages memory usage');
        $config->assert('metrics.sql.queries.count = 0', 'AddImages walltime');
        $this->assertBlackfire($config, function(){
            $this->client = static::createClient();
            $this->client->request('POST', '/supprimer/trick/1/images/5');
        });
    }


}