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

use App\Domain\Models\Tricks;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class TricksTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class TricksTest extends WebTestCase
{
    /**
     * @var Tricks
     */
    private $trick;

    public function setUp() {
        $trick = new Tricks( 'Japan Air', 1,  'japan ou japan air : saisie de l\'avant de la planche, 
        avec la main avant, du côté de la carre frontside. Un grab est d\'autant plus réussi que la saisie est longue. 
        De plus, le saut est d\'autant plus esthétique que la saisie du snowboard est franche');
        $this->trick = $trick;
    }

    public function testEntityMustBeInstancied()
    {
        static::assertInstanceOf(Tricks::class, $this->trick);
        static::assertObjectHasAttribute('id', $this->trick);
        static::assertObjectHasAttribute('userId', $this->trick);
        static::assertObjectHasAttribute('groupId', $this->trick);
        static::assertObjectHasAttribute('name', $this->trick);
        static::assertObjectHasAttribute('content', $this->trick);
        static::assertObjectHasAttribute('trickDate', $this->trick);
        static::assertObjectHasAttribute('trickUpdate', $this->trick);
        static::assertObjectHasAttribute('images', $this->trick);
        static::assertObjectHasAttribute('videos', $this->trick);
        static::assertObjectHasAttribute('group', $this->trick);
        static::assertObjectHasAttribute('user', $this->trick);
    }

    public function testEntityMustHaveValidAttributes()
    {
        $this->trick->setTrickDate('2018-03-04T16:56:29.328371+0000');
        $this->trick->setTrickUpdate('2018-03-05T11:36:14.328371+0000');
        static::assertContains('Japan Air', $this->trick->getName());
        static::assertContains('japan ou japan air : saisie de l\'avant de la planche, 
        avec la main avant, du côté de la carre frontside. Un grab est d\'autant plus réussi que la saisie est longue. 
        De plus, le saut est d\'autant plus esthétique que la saisie du snowboard est franche', $this->trick->getContent());
        static::assertEquals('2018-03-04T16:56:29.328371+0000', $this->trick->getTrickDate());
        static::assertEquals('2018-03-05T11:36:14.328371+0000', $this->trick->getTrickUpdate());
    }
}
