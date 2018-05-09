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

use App\Domain\DTO\Interfaces\TricksAddDTOInterface;
use App\Domain\Models\Groups;

/**
 * Class TrickAddDTO.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class TrickAddDTO implements TricksAddDTOInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $group;

    /**
     * @var string
     */
    public $content;

    /**
     * TrickAddDTO constructor.
     *
     * @param string $name
     * @param Groups $group
     * @param string $content
     */
    public function __construct(
        string $name = null,
        string $group = null,
        string $content = null
    ) {
        $this->name = $name;
        $this->group = $group;
        $this->content = $content;
    }
}
