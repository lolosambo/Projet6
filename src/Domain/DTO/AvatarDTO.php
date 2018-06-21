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


/**
 * Class AvatarDTO
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class AvatarDTO
{

    /**
     * @var $avatar
     */
    public $avatar;

    /**
     * AvatarDTO constructor.
     *
     * @param \SplFileInfo $avatar
     */
    public function __construct($avatar = null)
    {
        $this->avatar = $avatar;
    }

}