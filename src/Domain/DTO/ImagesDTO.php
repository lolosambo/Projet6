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

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\ImagesDTOInterface;

/**
 * Class MediasDTO.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ImagesDTO implements ImagesDTOInterface
{
    /**
     * @var \SplFileInfo
     */
    public $image;

    /**
     * ImagesDTO constructor.
     *
     * @param \SplFileInfo $image
     */
    public function __construct(\SplFileInfo $image = null)
    {
        $this->image = $image;
    }
}
