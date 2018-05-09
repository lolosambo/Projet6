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

/**
 * Class DeleteImageActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class DeleteVideoActionTest extends WebTestCase
{

    public function test_construct()
    {
        $action = new DeleteVideoAction( $this->createMock(VideosRepository::class));
        static::assertInstanceOf(DeleteVideoAction::class, $action);
    }

    public function test_delete_image_action()
    {
        $request = Request::create(
            '/supprimer/trick/1',
            'POST'
        );
        $action = new DeleteVideoAction($this->createMock(VideosRepository::class));
        $result = $action($request);
        static::assertInstanceOf(RedirectResponse::class, $result);
    }
}