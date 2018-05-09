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

use App\Domain\DTO\Interfaces\ALaUneDTOInterface;

/**
 * Class ALaUneDTO.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ALaUneDTO implements ALaUneDTOInterface
{
    /**
     * @var string
     */
    public $aLaUne = 0;

    /**
     * ALaUneDTO constructor.
     *
     * @param string $aLaUne
     */
    public function __construct(int $aLaUne = null)
    {
        if (($aLaUne == 0) || ($aLaUne == 1)) {
            $this->aLaUne = $aLaUne;
        }
    }
}
