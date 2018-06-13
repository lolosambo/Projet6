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

use App\Domain\Repository\ImagesRepository;
use App\UI\Actions\DeleteImageAction;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;

/**
 * Class DeleteImageActionBlackfireTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class DeleteImageActionTest extends WebTestCase
{
    private $repository;

    private $generator;

    public function setUp()
    {
        $this->repository = $this->createMock(ImagesRepository::class);
        $this->generator = $this->createMock(UrlGenerator::class);
    }

    public function testConstruct()
    {
        $action =  new DeleteImageAction($this->repository);
        static::assertInstanceOf(DeleteImageAction::class, $action);
    }

    public function testDeleteImageAction()
    {
        $request = Request::create(
            '/supprimer/trick/1/images/2',
            'POST'
        );
        $action = new DeleteImageAction($this->repository);
        $this->generator->method('generate')->willReturn('single_trick', ['trickId' => 1, 'mediaId' => 2]);

        static::assertInstanceOf(RedirectResponse::class, $action($request, $this->generator));
    }
}
