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

namespace Tests\Domain\Models;

use App\Domain\Models\Comments;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\TwigBundle\Tests\TestCase;

/**
 * Class CommentsTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class CommentsTest extends WebTestCase
{

    public function test_entity_must_be_instancied() {

        $comment = new Comments('lorem ipsum fiuehz ufheuz fuez ufeuz fz');

        static::assertInstanceOf(Comments::class, $comment);
        static::assertObjectHasAttribute('id', $comment);
        static::assertObjectHasAttribute('userId', $comment);
        static::assertObjectHasAttribute('trickId', $comment);
        static::assertObjectHasAttribute('content', $comment);
        static::assertObjectHasAttribute('commentDate', $comment);
        static::assertObjectHasAttribute('commentUpdate', $comment);
        static::assertObjectHasAttribute('trick', $comment);
        static::assertObjectHasAttribute('user', $comment);

    }

    public function test_entity_must_have_valid_attributes() {

        $comment = new Comments('lorem ipsum fiuehz ufheuz fuez ufeuz fz');
        $comment->setTrickId(3);
        $comment->setContent('lorem ipsum fiuehz ufheuz fuez ufeuz fz');
        $comment->setcommentDate('2018-03-04T16:56:29.328371+0000');
        $comment->setcommentUpdate('2018-03-05T11:36:14.328371+0000');


        static::assertEquals(3, $comment->getTrickId());
        static::assertContains('lorem ipsum fiuehz ufheuz fuez ufeuz fz', $comment->getContent());
        static::assertEquals('2018-03-04T16:56:29.328371+0000', $comment->getcommentDate());
        static::assertEquals('2018-03-05T11:36:14.328371+0000', $comment->getcommentUpdate());
    }
}
