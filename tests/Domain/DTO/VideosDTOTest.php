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

namespace Tests\Domain\DTO;

use App\Domain\DTO\VideosDTO;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class CommentsDTOTest
 *
 *  @author Laurent BERTON <lolosambo2@gmail.com>
 */
class VideosDTOTest extends WebTestCase
{
    /**
     * @var VideosDTO
     */
    private $dto;

    public function setUp()
    {
        $dto = new VideosDTO(
            'https://www.youtube.com/embed/LR4UE6isrLU',
            'https://www.youtube.com/embed/8q0wcmeJ2Gk',
            'https://www.dailymotion.com/embed/video/x1yrv17',
            'a-non-valid-address'
        );
        $this->dto = $dto;
    }

    /**
     * @group unit
     */
    public function testAddress1AttributeMustBeAString()
    {
        static::assertInternalType('string', $this->dto->address1);
    }

    /**
     * @group unit
     */
    public function testAddress2AttributeMustBeAString()
    {
        static::assertInternalType('string', $this->dto->address2);
    }

    /**
     * @group unit
     */
    public function testAddress3AttributeMustBeAString()
    {
        static::assertInternalType('string', $this->dto->address3);
    }

    /**
     * @group unit
     */
    public function testAddress4AttributeMustBeAString()
    {
        static::assertInternalType('string', $this->dto->address4);
    }

    /**
     * @group unit
     */
    public function testAddress1AttributeMustBeCompatibleWithRegexForYoutube()
    {
        static::assertRegExp(
            '/(https:\/\/www.youtube.com\/embed)\/([a-zA-Z0-9-_]+)/',
            $this->dto->address1
        );
    }

    /**
     * @group unit
     */
    public function testAddress2AttributeMustBeCompatibleWithRegexForYoutube()
    {
        static::assertRegExp(
            '/(https:\/\/www.youtube.com\/embed)\/([a-zA-Z0-9-_]+)/',
            $this->dto->address2
        );
    }

    /**
     * @group unit
     */
    public function testAddress3AttributeMustBeCompatibleWithRegexForDailyMotion()
    {
        static::assertRegExp(
            '/(https:\/\/www.dailymotion.com\/embed)\/([a-zA-Z0-9-_]+)/',
            $this->dto->address3
        );
    }

    /**
     * @group unit
     */
    public function testAddress4AttributeMustBeCompatibleWithRegexForDailyMotion()
    {
        static::assertRegExp(
            '/(https:\/\/www.dailymotion.com\/embed)\/([a-zA-Z0-9-_]+)/',
            $this->dto->address3
        );
    }
}
