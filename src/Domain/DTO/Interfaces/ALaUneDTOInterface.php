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
 * Interface ALaUneDTOInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface ALaUneDTOInterface
{
    /**
     * ALaUneDTOInterface constructor.
     *
     * @param string $aLaUne
     */
    public function __construct(int $aLaUne = null);
}
