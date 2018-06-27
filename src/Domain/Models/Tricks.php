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

use App\Domain\Models\Interfaces\CommentsInterface;
use App\Domain\Models\Interfaces\TricksInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


/**
 * Class Tricks.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class Tricks implements TricksInterface
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var UuidInterface
     */
    private $userId;

    /**
     * @var UuidInterface
     */
    private $groupId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

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
    private $images;

    /**
     * @var ArrayCollection
     */
    private $comments;

    /**
     * @var ArrayCollection
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
     * @param string          $group
     * @param string          $content
     */
    public function __construct(
        string $name = null,
        string $group = null,
        string $content = null
    ) {
        $this->setName($name);
        $this->setContent($content);
        $this->groupId = $group;
        $this->images = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->convertSlug($name);
    }

    /**
     * @return ArrayCollection|mixed
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
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Comments $comments
     *
     * @return $this
     */
    public function addComments(Comments $comment)
    {
        $this->comments[] = $comment;
        $comment->setTrick($this);
        return $this;
    }

    /**
     * @param Images $images
     */
    public function removeComment(Comments $comment)
    {
        $this->comments->removeElement($comment);
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
     * @return UuidInterface
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return UuidInterface
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param UuidInterface  $userId
     */
    public function setUserId(UuidInterface $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return UuidInterface
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param UuidInterface  $groupId
     */
    public function setGroupId(UuidInterface $groupId)
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
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param $slug
     */
    public function convertSlug($name)
    {
        $this->slug = str_replace(' ', '_', $name);
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
        $this->content = $content;
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
    public function setTrickDate(\DateTime $trickDate)
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
    public function setTrickUpdate(\DateTime $trickUpdate)
    {
        $this->trickUpdate = $trickUpdate;
    }
}
