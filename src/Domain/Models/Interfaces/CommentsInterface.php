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

namespace App\Domain\Models\Interfaces;

/**
 * Interface CommentsInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface CommentsInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getTrickId();

    /**
     * @param $trickId
     */
    public function setTrickId($trickId);

    /**
     * @return mixed
     */
    public function getUserId();

    /**
     * @param $userId
     */
    public function setUserId($userId);

    /**
     * @return mixed
     */
    public function getContent();

    /**
     * @param $content
     */
    public function setContent($content);

    /**
     * @return mixed
     */
    public function getCommentDate();

    /**
     * @param $commentDate
     */
    public function setCommentDate($commentDate);

    /**
     * @return mixed
     */
    public function getCommentUpdate();

    /**
     * @param $commentUpdate
     */
    public function setCommentUpdate($commentUpdate);

    /**
     * @return mixed
     */
    public function getTrick();

    /**
     * @param $trick
     */
    public function setTrick($trick);

    /**
     * @return mixed
     */
    public function getUser();

    /**
     * @param $user
     */
    public function setUser($user);

}