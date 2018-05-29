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

use App\Domain\Repository\TricksRepository;
use App\UI\Actions\DeleteTrickAction;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;

/**
 * Class DeleteImageActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class DeleteTrickActionTest extends WebTestCase
{
    private $repository;

    private $generator;

    public function setUp()
    {
        $this->repository = $this->createMock(TricksRepository::class);
        $this->generator = $this->createMock(UrlGenerator::class);
    }

    public function testConstruct()
    {
        $action = new DeleteTrickAction( $this->repository);
        static::assertInstanceOf(DeleteTrickAction::class, $action);
    }

    public function testDeleteTrickAction()
    {
        $request = Request::create(
            '/supprimer/trick/1',
            'POST'
        );
        $action = new DeleteTrickAction($this->repository);
        $this->generator->method('generate')->willReturn('homepage');

        static::assertInstanceOf(RedirectResponse::class, $action($request, $this->generator));
    }
}