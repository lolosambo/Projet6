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

use App\Domain\Models\Images;
use App\Domain\Repository\ImagesRepository;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use App\UI\Actions\DeleteImageAction;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class DeleteImageActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class DeleteImageActionTest extends WebTestCase
{

    private $client;

    private $repository;

    private $generator;

    private $em;

    public function setUp()
    {
        parent::setUp();
        $this->client = static::createClient();
        $this->em = $this->client->getContainer()->get('doctrine')->getManager();
        $this->repository = $this->em->getRepository(Images::class);

        $this->generator = $this->createMock(UrlGeneratorInterface::class);
    }

    /**
     * @group functional
     */
    public function testDeleteImageConstruct()
    {
        $action =  new DeleteImageAction($this->repository);
        static::assertInstanceOf(DeleteImageAction::class, $action);
    }

    /**
     * @group functional
     */
    public function testDeleteImageAction()
    {
        $request = Request::create(
            '/supprimer/trick/Figure_0/images/7c32b303-e404-4171-b536-2b7b3c16ca29',
            'GET'
        );

        $action = new DeleteImageAction($this->repository);
        static::assertInstanceOf(RedirectResponse::class, $action(
            $request,
            $this->generator
            )
        );
    }
}
