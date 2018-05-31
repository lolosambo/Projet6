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

    /** @test */
    public function entity_must_be_instancied() {

        static::assertInstanceOf(Images::class, $this->image);
        static::assertObjectHasAttribute('id', $this->image);
        static::assertObjectHasAttribute('trickId', $this->image);
        static::assertObjectHasAttribute('url', $this->image);
        static::assertObjectHasAttribute('trick', $this->image);
        static::assertObjectHasAttribute('aLaUne', $this->image);
    }

    /** @test */
    public function aLaUne_attribute_must_be_0_or_1()
    {
        $this->image->setALaUne(1);
        static::assertEquals(1, $this->image->getALaUne());

        $this->image->setALaUne(0);
        static::assertEquals(0, $this->image->getALaUne());
    }

    /** @test */
    public function aLaUne_attribute_return_0_if_others_values()
    {
        $this->image->setALaUne(3);
        static::assertEquals(0, $this->image->getALaUne());
    }

    /** @test */
    public function url_attribute_must_be_compatible_with_regex()
    {
        $this->image->setUrl('testimage.jpg');
        static::assertRegExp('/([a-zA-Z0-9-_]+)\.[jpg | JPG | jpeg | JPEG | gif | GIF | tiff | TIFF | png | PNG | bmp | BMP]/',
            $this->image->getUrl()
        );
    }

}
