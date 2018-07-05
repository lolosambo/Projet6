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

use App\Domain\Repository\VideosRepository;
use App\UI\Actions\DeleteVideoAction;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;

/**
 * Class DeleteImageActionBlackfireTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class DeleteVideoActionTest extends WebTestCase
{
    private $repository;

    private $generator;

    public function setUp()
    {
        $this->repository = $this->createMock(VideosRepository::class);
        $this->generator = $this->createMock(UrlGenerator::class);
    }

    /**
     * @group unit
     */
    public function testConstruct()
    {
        $action = new DeleteVideoAction( $this->repository);
        static::assertInstanceOf(DeleteVideoAction::class, $action);
    }

    /**
     * @group functional
     */
    public function testDeleteVideoAction()
    {
        $request = Request::create(
            '/supprimer/trick/Figure_0',
            'POST'
        );
        $action = new DeleteVideoAction($this->repository);

        static::assertInstanceOf(RedirectResponse::class, $action(
            $request,
            $this->generator
            )
        );
    }
}
