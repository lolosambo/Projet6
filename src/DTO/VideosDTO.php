<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\DTO;

use App\DTO\Interfaces\VideosDTOInterface;

/**
 * Class VideosDTO.
 */
class VideosDTO implements VideosDTOInterface
{
    /**
     * @var string
     */
    public $address1;

    /**
     * @var string
     */
    public $address2;

    /**
     * @var string
     */
    public $address3;

    /**
     * @var string
     */
    public $address4;

    /**
     * VideosDTO constructor.
     *
     * @param array $addresses
     */
    public function __construct(
        string $address1 = null,
        string $address2 = null,
        string $address3 = null,
        string $address4 = null
    ) {
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->address3 = $address3;
        $this->address4 = $address4;
    }
}
