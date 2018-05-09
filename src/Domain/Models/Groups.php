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

namespace App\Domain\Models;

use App\Domain\Models\Interfaces\GroupsInterface;

/**
 * Class Groups.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class Groups implements GroupsInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $group;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param $group
     */
    public function setGroup($group)
    {
        $this->group = htmlspecialchars($group);
    }
}
