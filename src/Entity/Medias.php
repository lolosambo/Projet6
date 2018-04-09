<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Entity;

/**
 * Class Medias.
 */
class Medias
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $trickId;

    /**
     * @var string
     */
    private $type;

    /**
     * @var Medias
     */
    private $media;

    /**
     * @var string
     */
    private $url;

    /**
     * @var bool
     */
    private $aLaUne = 0;

    /**
     * @var Tricks
     */
    private $trick;

    /**
     * Medias constructor.
     *
     * @param int $trickId
     * @param $media
     */
    public function __construct(int $trickId, $media)
    {
        $this->setTrickId($trickId);
        $this->media = $media;
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
    public function getTrickId()
    {
        return $this->trickId;
    }

    /**
     * @param $trickId
     */
    public function setTrickId($trickId)
    {
        if (is_int($trickId)) {
            $this->trickId = $trickId;
        }
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        if (('Image' == $type) || ('Video' == $type)) {
            $this->type = $type;
        }
    }

    /**
     * @return mixed
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param mixed $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getALaUne()
    {
        return $this->aLaUne;
    }

    /**
     * @param $aLaUne
     */
    public function setALaUne($aLaUne)
    {
        if ((0 == $aLaUne) || (1 == $aLaUne)) {
            $this->aLaUne = $aLaUne;
        }
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
}
