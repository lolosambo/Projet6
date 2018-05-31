<?php

namespace Tests\Domain\Models;

use App\Domain\Models\Videos;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class VideosTest extends WebTestCase
{
    /**
     * @var Videos
     */
    private $video;

    public function setUp() {
        $video = new Videos();
        $this->video = $video;
    }

    public function testEntityMustBeInstancied()
    {
        static::assertInstanceOf(Videos::class, $this->video);
        static::assertObjectHasAttribute('id', $this->video);
        static::assertObjectHasAttribute('trickId', $this->video);
        static::assertObjectHasAttribute('url', $this->video);
        static::assertObjectHasAttribute('trick', $this->video);
    }

    public function testYoutubeUrlAttributeMustBeCompatibleWithRegex()
    {
        $this->video->setUrl('https://www.youtube.com/embed/LR4UE6isrLU');
        static::assertRegExp('/(https:\/\/www.youtube.com\/embed)\/([a-zA-Z0-9-_]+)/',
            $this->video->getUrl()
        );
    }

    public function testDailyMotionUrlAttributeMustBeCompatibleWithRegex()
    {
        $this->video->setUrl('https://www.dailymotion.com/embed/LR4UE6isrLU');
        static::assertRegExp('/(https:\/\/www.dailymotion.com\/embed)\/([a-zA-Z0-9-_]+)/',
            $this->video->getUrl()
        );
    }
}
