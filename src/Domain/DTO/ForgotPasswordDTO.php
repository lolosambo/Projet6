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

use App\Domain\DTO\Interfaces\ForgotPasswordDTOInterface;

/**
 * class ForgotPasswordDTO
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ForgotPasswordDTO implements ForgotPasswordDTOInterface
{
    /**
     * @var string
     */
    public $pseudo;

    /**
     * @var string
     */
    public $mail;

    /**
     * ForgotPasswordDTO constructor.
     *
     * @param string|null $pseudo
     * @param string|null $mail
     */
    public function __construct(string $pseudo = null, string $mail = null)
    {
        $this->mail = $mail;
        $this->pseudo = $pseudo;
    }
}
