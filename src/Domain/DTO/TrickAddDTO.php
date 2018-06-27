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
     * @var Groups
     */
    public $group;

    /**
     * @var string
     */
    public $content;

    /**
     * @var \SplFileInfo[]
     */
    public $image;

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
     * TrickAddDTO constructor.
     *
     * @param string|null     $name
     * @param Groups|null     $group
     * @param                 $content
     * @param \SplFileInfo[]  $image
     * @param string|null     $address1
     * @param string|null     $address2
     * @param string|null     $address3
     * @param string|null     $address4
     */
    public function __construct(
        string $name = null,
        Groups $group = null,
        $content = null,
        array $image = null,
        string $address1 = null,
        string $address2 = null,
        string $address3 = null,
        string $address4 = null

    ) {
        $this->name = $name;
        $this->group = $group;
        $this->content = $content;
        $this->image = $image;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->address3 = $address3;
        $this->address4 = $address4;
    }
}
