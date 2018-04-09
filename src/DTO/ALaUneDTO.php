<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\DTO;

use App\DTO\Interfaces\ALaUneDTOInterface;

/**
 * Class ALaUneDTO.
 */
class ALaUneDTO implements ALaUneDTOInterface
{
    /**
     * @var string
     */
    public $aLaUne;

    /**
     * ALaUneDTO constructor.
     *
     * @param string $aLaUne
     */
    public function __construct(string $aLaUne = null)
    {
        $this->aLaUne = $aLaUne;
    }
}
