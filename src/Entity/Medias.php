<?php

namespace App\Entity;


class Medias
{

    private $id;


    private $trickId;


    private $type;


    private $media;


    private $url;


    private $aLaUne = 0;


    private $trick;

    public function __construct($trickId, $media) {
        $this->setTrickId($trickId);
        $this->media = $media;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getTrickId()
    {
        return $this->trickId;
    }


    public function setTrickId($trickId)
    {
        if (is_int($trickId)) {
            $this->trickId = $trickId;
        }
    }


    public function getType()
    {
        return $this->type;
    }


    public function setType($type)
    {
        if (($type == 'Image') || ($type == 'Video')) {
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
    public function setMedia($media): void
    {
        $this->media = $media;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getUrl()
    {
        return $this->url;
    }


    public function setUrl($url)
    {
        if(preg_match('#^\.\./uploads/([0-9a-zA-Z-_]+)\.jpg|jpeg|png$#', $url)) {
            $this->url = $url;
        } else {
            return false;
        }
    }


    public function getALaUne()
    {
        return $this->aLaUne;
    }


    public function setALaUne($aLaUne)
    {
        if (($aLaUne == 0) || ($aLaUne == 1)) {
            $this->aLaUne = $aLaUne;
        }
    }


    public function getTrick()
    {
        return $this->trick;
    }


    public function setTrick($trick)
    {
        $this->trick = $trick;
        return $this;
    }


}
