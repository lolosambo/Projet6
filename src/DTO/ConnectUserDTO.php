<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\DTO;

use App\DTO\Interfaces\ConnectUserDTOInterface;

/**
 * Class ConnectUserDTO.
 */
class ConnectUserDTO implements ConnectUserDTOInterface
{
    /**
     * @var string
     */
    public $pseudo;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $mail;

    /**
     * ConnectUserDTO constructor.
     *
     * @param string $pseudo
     * @param string $password
     * @param string $mail
     */
    public function __construct(
        string $pseudo = null,
        string $password = null,
        string $mail = null
    ) {
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->mail = $mail;
    }
}
