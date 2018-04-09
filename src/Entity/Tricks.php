<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Tricks.
 */
class Tricks
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $groupId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \Datetime
     */
    private $trickDate;

    /**
     * @var \Datetime
     */
    private $trickUpdate;

    /**
     * @var ArrayCollection
     */
    private $medias;

    /**
     * @var Users
     */
    private $user;

    /**
     * @var Groups
     */
    private $group;

    /**
     * Tricks constructor.
     *
     * @param ArrayCollection $medias
     * @param string          $name
     * @param int             $group
     * @param string          $content
     */
    public function __construct(
        ArrayCollection $medias,
        string $name,
        int $group,
        string $content
    ) {
        $this->medias = $medias;
        $this->setName(htmlspecialchars($name));
        $this->setContent(htmlspecialchars($content));
        $this->group = $group;
    }

    public function getMedias()
    {
        return $this->medias;
    }

    /**
     * @param Medias $media
     *
     * @return $this
     */
    public function addMedia(Medias $media)
    {
        $this->medias[] = $media;
        $media->setTrick($this);

        return $this;
    }

    /**
     * @param Medias $media
     */
    public function removeMedia(Medias $media)
    {
        $this->medias->removeElement($media);
    }

    /**
     * @return Users
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param $user
     *
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Groups
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param $group
     *
     * @return $this
     */
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param $groupId
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = htmlspecialchars($name);
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $content
     */
    public function setContent($content)
    {
        $this->content = htmlspecialchars($content);
    }

    /**
     * @return \Datetime
     */
    public function getTrickDate()
    {
        return $this->trickDate;
    }

    /**
     * @param $trickDate
     */
    public function setTrickDate($trickDate)
    {
        $this->trickDate = $trickDate;
    }

    /**
     * @return \Datetime
     */
    public function getTrickUpdate()
    {
        return $this->trickUpdate;
    }

    /**
     * @param $trickUpdate
     */
    public function setTrickUpdate($trickUpdate)
    {
        $this->trickUpdate = $trickUpdate;
    }
}
