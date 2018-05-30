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

use App\Domain\Models\Interfaces\TricksInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;


/**
 * Class Tricks.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class Tricks implements TricksInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Uuid
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
     * @var Images
     */
    private $images;

    /**
     * @var Videos
     */
    private $videos;

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
     * @param string          $name
     * @param int             $group
     * @param string          $content
     */
    public function __construct(
        string $name = null,
        int $group = null,
        string $content = null
    ) {
        $this->setName(htmlspecialchars($name));
        $this->setContent(htmlspecialchars($content));
        $this->groupId = $group;
        $this->images = new ArrayCollection();
        $this->videos = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param Images $images
     *
     * @return $this
     */
    public function addImage(Images $images)
    {
        $this->images[] = $images;
        $images->setTrick($this);

        return $this;
    }

    /**
     * @param Images $images
     */
    public function removeImages(Images $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * @return ArrayCollection
     */
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * @param Videos $videos
     *
     * @return $this
     */
    public function addVideo(Videos $videos)
    {
        $this->videos[] = $videos;
        $videos->setTrick($this);

        return $this;
    }

    /**
     * @param Videos $videos
     */
    public function removeVideos(Videos $videos)
    {
        $this->videos->removeElement($videos);
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
     * @return Uuid
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param Uuid  $userId
     */
    public function setUserId(Uuid $userId)
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
