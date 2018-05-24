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
 * Interface VideosDTOInterface.
 */
interface VideosDTOInterface
{
    /**
     * VideosDTOInterface constructor.
     *
     * @param null $address1
     * @param null $address2
     * @param null $address3
     * @param null $address4
     */
    public function __construct(
        string $address1 = null,
        string $address2 = null,
        string $address3 = null,
        string $address4 = null
    );
}
