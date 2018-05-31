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

use App\Domain\DTO\ImagesDTO;

/**
 * Class ImagesDTOTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ImagesDTOTest
{
    /**
     * @var ImagesDTO
     */
    private $dto;

    public function setUp()
    {
        $dto = new ImagesDTO();
        $this->dto = $dto;
    }

    public function testImageAttributeMustBeAnImageFile()
    {
        static::assertInternalType('\SplFileInfo', $this->dto->image);
    }
}
