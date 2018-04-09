<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\DTO\Interfaces;

/**
 * Interface TricksAddDTOInterface.
 */
interface TricksAddDTOInterface
{
    public function __construct(
        string $name,
        string $group,
        string $content
    );
}
