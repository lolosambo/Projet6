<?php

namespace App\Entity;


class Groups {

    private $id;

    private $group;

    public function __construct($group) {
        $this->setGroup($group);
    }


    public function getId()
    {
        return $this->id;
    }


    public function getGroup()
    {
        return $this->group;
    }


    public function setGroup($group)
    {
        $this->group = htmlspecialchars($group);
    }
}
