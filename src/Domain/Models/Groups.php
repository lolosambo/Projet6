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
use Ramsey\Uuid\UuidInterface;

/**
 * Class Groups.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class Groups implements GroupsInterface
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @return UuidInterface
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $group
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
