<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\DTO;

use App\DTO\Interfaces\MediasDTOInterface;

/**
 * Class MediasDTO.
 */
class MediasDTO implements MediasDTOInterface
{
    /**
     * @var \SplFileInfo
     */
    public $media;

    /**
     * MediasDTO constructor.
     *
     * @param null $media
     */
    public function __construct($media = null)
    {
        $this->media = $media;
    }
}
