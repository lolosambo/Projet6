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
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

/**
 * Class CommentsActionFunctionalTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class CommentsActionFunctionalTest extends WebTestCase
{
    use TestCaseTrait;

    private $user;

    public function setUp()
    {
        $client = static::createClient();
        $em = $client->getContainer()
                          ->get('doctrine')
                          ->getManager()
                          ->getRepository(Users::class);
        $this->user = $em->createQueryBuilder('u')
            ->where('u.pseudo = ?1')
            ->setParameter(1, "User1")
            ->getQuery()
            ->getOneOrNullResult();
    }

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
     * @group functional
     */
    public function testCommentForm()
    {
        $client = static::createClient();
        $token = new UsernamePasswordToken($this->user, null, 'test', $this->user->getRoles());
        $session = $client->getContainer()->get('session');
        $session->set('_security_'.'test', serialize($token));
        $session->set('pseudo', $this->user->getPseudo());
        $session->set('user', $this->user);
        $session->save();

        $crawler = $client->request('GET', '/trick/Figure_27');
        $form = $crawler->selectButton('Commenter')->form();
        $form['comment[content]'] = "Some comment";
        $crawler = $client->submit($form);
        $crawler = $client->followRedirect();
        static::assertSame(1, $crawler->filter('div.flash-notice')->count());
    }

}