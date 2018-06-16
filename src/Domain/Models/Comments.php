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
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Comments.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class Comments implements CommentsInterface
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var UuidInterface
     */
    private $trickId;

    /**
     * @var UuidInterface
     */
    private $userId;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $commentDate;

    /**
     * @var \DateTime
     */
    private $commentUpdate;

    /**
     * @var Tricks
     */
    private $trick;

    /**
     * @var Users
     */
    private $user;

    /**
     * Comments constructor.
     *
     * @param $content
     */
    public function __construct($content)
    {
        $this->content= $content;
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
    public function getTrickId()
    {
        return $this->trickId;
    }

    /**
     * @param string $trickId
     */
    public function setTrickId(string $trickId)
    {
        $this->trickId = $trickId;
    }

    /**
     * @return UuidInterface
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string  $userId
     */
    public function setUserId(string $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
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
     * @return mixed
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param $commentDate
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
    }

    /**
     * @return mixed
     */
    public function getCommentUpdate()
    {
        return $this->commentUpdate;
    }

    /**
     * @param $commentUpdate
     */
    public function setCommentUpdate($commentUpdate)
    {
        $this->commentUpdate = $commentUpdate;
    }

    /**
     * @return mixed
     */
    public function getTrick()
    {
        return $this->trick;
    }

    /**
     * @param $trick
     *
     * @return $this
     */
    public function setTrick($trick)
    {
        $this->trick = $trick;

        return $this;
    }

    /**
     * @return mixed
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
}
