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

namespace App\Domain\DTO\Interfaces;

/**
 * Interface ImagesDTOInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface ImagesDTOInterface
{
    /**
     * ImagesDTOInterface constructor.
     *
     * @param array|null $image
     */
    public function __construct(array $image = null);
}

