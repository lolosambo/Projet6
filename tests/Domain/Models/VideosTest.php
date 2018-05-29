<?php

namespace Tests\Domain\Models;

use App\Domain\Models\Videos;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class VideosTest extends WebTestCase
{
    /**
     * @var Images
     */
    private $video;

    public function setUp() {
        $video = new Videos();
        $this->video = $video;
    }

    /** @test */
    public function entity_must_be_instancied() {

        static::assertInstanceOf(Videos::class, $this->video);
        static::assertObjectHasAttribute('id', $this->video);
        static::assertObjectHasAttribute('trickId', $this->video);
        static::assertObjectHasAttribute('url', $this->video);
        static::assertObjectHasAttribute('trick', $this->video);
    }

    /** @test */
    public function youtube_url_attribute_must_be_compatible_with_regex()
    {
        $this->video->setUrl('https://www.youtube.com/embed/LR4UE6isrLU');
        static::assertRegExp('/(https:\/\/www.youtube.com\/embed)\/([a-zA-Z0-9-_]+)/',
            $this->video->getUrl()
        );
    }

    /** @test */
    public function dailyMotion_url_attribute_must_be_compatible_with_regex()
    {
        $this->video->setUrl('https://www.dailymotion.com/embed/LR4UE6isrLU');
        static::assertRegExp('/(https:\/\/www.dailymotion.com\/embed)\/([a-zA-Z0-9-_]+)/',
            $this->video->getUrl()
        );
    }
}