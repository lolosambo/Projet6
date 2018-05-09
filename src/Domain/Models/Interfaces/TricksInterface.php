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

use App\Domain\Models\Images;
use App\Domain\Models\Medias;
use App\Domain\Models\Videos;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Interface Tricks.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface TricksInterface
{

//    /**
//     * @return mixed
//     */
//    public function getMedias();
//
//    /**
//     * @param Medias $media
//     *
//     * @return mixed
//     */
//    public function addMedia(Medias $media);
//
//    /**
//     * @param Medias $media
//     *
//     * @return mixed
//     */
//    public function removeMedia(Medias $media);

    /**
     * @return mixed
     */
    public function getUser();

    /**
     * @param $user
     *
     * @return mixed
     */
    public function setUser($user);

    /**
     * @return mixed
     */
    public function getGroup();

    /**
     * @param $group
     *
     * @return mixed
     */
    public function setGroup($group);

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getUserId();

    /**
     * @param $userId
     *
     * @return mixed
     */
    public function setUserId($userId);

    /**
     * @return mixed
     */
    public function getGroupId();

    /**
     * @param $groupId
     *
     * @return mixed
     */
    public function setGroupId($groupId);

    /**
     * @return mixed
     */
    public function getImages();

    /**
     * @param Images $images
     *
     * @return mixed
     */
    public function addImage(Images $images);

    /**
     * @param Images $images
     *
     * @return mixed
     */
    public function removeImages(Images $images);

    /**
     * @return mixed
     */
    public function getVideos();

    /**
     * @param Videos $videos
     *
     * @return mixed
     */
    public function addVideo(Videos $videos);

    /**
     * @param Videos $videos
     *
     * @return mixed
     */
    public function removeVideos(Videos $videos);

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param $name
     *
     * @return mixed
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getContent();

    /**
     * @param $content
     *
     * @return mixed
     */
    public function setContent($content);

    /**
     * @return mixed
     */
    public function getTrickDate();

    /**
     * @param $trickDate
     *
     * @return mixed
     */
    public function setTrickDate($trickDate);

    /**
     * @return mixed
     */
    public function getTrickUpdate();

    /**
     * @param $trickUpdate
     *
     * @return mixed
     */
    public function setTrickUpdate($trickUpdate);
}
