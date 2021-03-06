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
 * Interface InscriptionUserDTOInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface InscriptionUserDTOInterface
{
    /**
     * InscriptionUserDTOInterface constructor.
     *
     * @param string|null $pseudo
     * @param string|null $password
     * @param string|null $mail
     */
    public function __construct(
        string $pseudo = null,
        string $password = null,
        string $mail = null
    );
}

