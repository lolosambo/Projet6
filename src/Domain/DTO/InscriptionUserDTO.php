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

use App\Domain\DTO\Interfaces\InscriptionUserDTOInterface;

/**
 * Class InscriptionUserDTO.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
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
    public $mail;

    /**
     * InscriptionUserDTO constructor.
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
