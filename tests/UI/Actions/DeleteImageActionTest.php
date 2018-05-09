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

/**
 * Class DeleteImageActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class DeleteImageActionTest extends WebTestCase
{

    public function test_construct()
    {
        $action = new DeleteImageAction( $this->createMock(ImagesRepository::class));
        static::assertInstanceOf(DeleteImageAction::class, $action);
    }

    public function test_delete_image_action()
    {
        $request = Request::create(
            '/supprimer/trick/1/images/2',
            'POST'
        );
        $action = new DeleteImageAction($this->createMock(ImagesRepository::class));
        $result = $action($request);
        static::assertInstanceOf(RedirectResponse::class, $result);
    }
}
