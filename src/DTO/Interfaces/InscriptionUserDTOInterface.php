<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\DTO\Interfaces;

/**
 * Interface InscriptionUserDTOInterface.
 */
interface InscriptionUserDTOInterface
{
    /**
     * InscriptionUserDTOInterface constructor.
     *
     * @param string|null $pseudo
     * @param string|null $password
     * @param string|null $password2
     * @param string|null $mail
     */
    public function __construct(
        string $pseudo = null,
        string $password = null,
        string $password2 = null,
        string $mail = null
    );
}
