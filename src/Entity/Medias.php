<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediasRepository")
 * @ORM\Table (name="Medias")
 */
class Medias
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idTrick;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="boolean")
     */
    private $aLaUne;

    /**
     * @ORM\Column(type="datetime")
     */
    private $mediaDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tricks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trick;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdTrick()
    {
        return $this->idTrick;
    }

    /**
     * @param mixed $idTrick
     */
    public function setIdTrick($idTrick)
    {
        $this->idTrick = $idTrick;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getALaUne()
    {
        return $this->aLaUne;
    }

    /**
     * @param mixed $confirmed
     */
    public function setALaUne($confirmed)
    {
        $this->aLaUne = $confirmed;
    }

    /**
     * @return mixed
     */
    public function getMediaDate()
    {
        return $this->mediaDate;
    }

    /**
     * @param mixed $date
     */
    public function setMediaDate($date)
    {
        $this->mediaDate = $date;
    }

    public function setTrick(Tricks $trick)
    {
        $this->trick = $trick;

        return $this;
    }

    public function getTrick()
    {
        return $this->trick;
    }





}