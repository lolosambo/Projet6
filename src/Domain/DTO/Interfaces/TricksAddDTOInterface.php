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
     * @param string $name
     * @param string $group
     * @param string $content
     */
    public function __construct(
        string $name,
        string $group,
        string $content
    );
}
