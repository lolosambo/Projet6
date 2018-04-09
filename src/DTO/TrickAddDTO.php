<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\DTO;

use App\DTO\Interfaces\TricksAddDTOInterface;

/**
 * Class TrickAddDTO.
 */
class TrickAddDTO implements TricksAddDTOInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
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
     * @param string $group
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
