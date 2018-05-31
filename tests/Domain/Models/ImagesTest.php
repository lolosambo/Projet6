<?php

namespace Tests\Domain\Models;

use App\Domain\Models\Images;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class ImagesTest extends WebTestCase
{
    /**
     * @var VideosTest
     */
    private $image;

    public function setUp() {
        $image = new Images();
        $this->image = $image;
    }


    public function testEntityMustBeInstancied()
    {
        static::assertInstanceOf(Images::class, $this->image);
        static::assertObjectHasAttribute('id', $this->image);
        static::assertObjectHasAttribute('trickId', $this->image);
        static::assertObjectHasAttribute('url', $this->image);
        static::assertObjectHasAttribute('trick', $this->image);
        static::assertObjectHasAttribute('aLaUne', $this->image);
    }

    public function testALaUneAttributeMustBe0Or1()
    {
        $this->image->setALaUne(1);
        static::assertEquals(1, $this->image->getALaUne());

        $this->image->setALaUne(0);
        static::assertEquals(0, $this->image->getALaUne());
    }

    public function testALaUneAttributeReturn0IfOthersValues()
    {
        $this->image->setALaUne(3);
        static::assertEquals(0, $this->image->getALaUne());
    }

    public function testUrlAttributeMustBeCompatibleWithRegex()
    {
        $this->image->setUrl('testimage.jpg');
        static::assertRegExp('/([a-zA-Z0-9-_]+)\.[jpg | JPG | jpeg | JPEG | gif | GIF | tiff | TIFF | png | PNG | bmp | BMP]/',
            $this->image->getUrl()
        );
    }
}

