<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace Tests\Entity;

use App\Entity\Medias;
use Symfony\Bundle\TwigBundle\Tests\TestCase;

/**
 * Class MediasTest
 */
class MediasTest extends TestCase
{
    /**
     * @var Medias
     */
    private $media;

    public function setUp() {
        $media = new Medias(1, 'Photo1.jpg');
        $this->media = $media;
    }

    public function test_entity_must_be_instancied() {

        static::assertInstanceOf(Medias::class, $this->media);
        static::assertObjectHasAttribute('id', $this->media);
        static::assertObjectHasAttribute('trickId', $this->media);
        static::assertObjectHasAttribute('type', $this->media);
        static::assertObjectHasAttribute('media', $this->media);
        static::assertObjectHasAttribute('url', $this->media);
        static::assertObjectHasAttribute('aLaUne', $this->media);
        static::assertObjectHasAttribute('trick', $this->media);
    }

    public function test_entity_must_have_valid_attributes() {

        static::assertEquals(1, $this->media->getTrickId());
        static::assertContains('Photo1.jpg', $this->media->getMedia());
    }

    /** @test */
    public function media_url_must_be_valid() {

        $this->media->setUrl('../uploads/exemple.jpg');
        static::assertContains('../uploads/exemple.jpg', $this->media->getUrl());
    }

    /** @test */
    public function media_a_la_une_must_return_true_when_published_in_homepage() {
        $this->media->setALaUne(true);
        static::assertTrue($this->media->getALaUne());
    }

    /** @test */
    public function media_a_la_une_must_return_false_when_not_published_in_homepage() {
        $this->media->setALaUne(false);
        static::assertFalse($this->media->getALaUne());
    }
}
