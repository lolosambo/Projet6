<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\DTO\Interfaces;

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
