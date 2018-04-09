<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Entity;

/**
 * Class Groups.
 */
class Groups
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
     * Groups constructor.
     *
     * @param $group
     */
    public function __construct($group)
    {
        $this->setGroup($group);
    }

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
