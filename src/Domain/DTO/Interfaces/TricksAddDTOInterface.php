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

use App\Domain\Models\Groups;

/**
 * Interface TricksAddDTOInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface TricksAddDTOInterface
{
    /**
     * TricksAddDTOInterface constructor.
     *
     * @param string|null $name
     * @param Groups|null $group
     * @param string|null $content
     * @param array|null $image
     * @param string|null $address1
     * @param string|null $address2
     * @param string|null $address3
     * @param string|null $address4
     */
    public function __construct(
        string $name = null,
        Groups $group = null,
        string $content = null,
        array $image = null,
        string $address1 = null,
        string $address2 = null,
        string $address3 = null,
        string $address4 = null
    );
}
