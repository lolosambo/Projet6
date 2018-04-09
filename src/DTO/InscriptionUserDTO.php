<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\DTO;

use App\DTO\Interfaces\InscriptionUserDTOInterface;

/**
 * Class InscriptionUserDTO.
 */
class InscriptionUserDTO implements InscriptionUserDTOInterface
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
    public $password2;

    /**
     * @var string
     */
    public $mail;

    /**
     * InscriptionUserDTO constructor.
     *
     * @param string $pseudo
     * @param string $password
     * @param string $password2
     * @param string $mail
     */
    public function __construct(
        string $pseudo = null,
        string $password = null,
        string $password2 = null,
        string $mail = null
    ) {
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->password2 = $password2;
        $this->mail = $mail;
    }
}
