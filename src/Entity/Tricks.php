<?php

namespace App\Entity;


class Tricks
{

    private $id;

    private $userId;

    private $groupId;

    private $name;

    private $content;

    private $trickDate;

    private $trickUpdate;


    private $user;

    private $group;


    public function __construct($name, $group, $content) {

        $this->setName(htmlspecialchars($name));
        $this->setContent(htmlspecialchars($content));
    }


    public function getUser()
    {
        return $this->user;
    }


    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }


    public function getGroup()
    {
        return $this->group;
    }


    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getUserId()
    {
        return $this->userId;
    }


    public function setUserId($userId)
    {
        $this->userId = $userId;
    }


    public function getGroupId()
    {
        return $this->groupId;
    }


    public function setGroupId($groupId)
    {
       $this->groupId = $groupId;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = htmlspecialchars($name);
    }


    public function getContent()
    {
        return $this->content;
    }


    public function setContent($content)
    {
        $this->content = htmlspecialchars($content);
    }


    public function getTrickDate()
    {
        return $this->trickDate;
    }


    public function setTrickDate($trickDate)
    {
        $this->trickDate = $trickDate;
    }


    public function getTrickUpdate()
    {
        return $this->trickUpdate;
    }


    public function setTrickUpdate($trickUpdate)
    {
        $this->trickUpdate = $trickUpdate;
    }

}
