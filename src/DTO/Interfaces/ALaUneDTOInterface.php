<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\DTO\Interfaces;

/**
 * Interface ALaUneDTOInterface.
 */
interface ALaUneDTOInterface
{
    /**
     * ALaUneDTOInterface constructor.
     *
     * @param string|null $aLaUne
     */
    public function __construct(string $aLaUne = null);
}
