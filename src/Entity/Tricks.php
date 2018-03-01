<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TricksRepository")
 * @ORM\Table (name="Tricks")
 */
class Tricks {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy ="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idUser;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $trickName;

    /**
     * @ORM\Column(type="string")
     */
    private $trickContent;

    /**
     * @ORM\Column(type="datetime")
     */
    private $trickDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $trickUpdate;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Groups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $group;


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
    public function getIdUser()
    {
        return $this->id;
    }

    /**
     * @param mixed $trickName
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }


    /**
     * @return mixed
     */
    public function getTrickName()
    {
        return $this->trickName;
    }

    /**
     * @param mixed $trickName
     */
    public function setTrickName($trickName)
    {
        $this->trickName = $trickName;
    }

    /**
     * @return mixed
     */
    public function getTrickGroup()
    {
        return $this->trickGroup;
    }

    /**
     * @param mixed $trickGroup
     */
    public function setTrickGroup($trickGroup)
    {
        $this->trickGroup = $trickGroup;
    }

    /**
     * @return mixed
     */
    public function getTrickContent()
    {
        return $this->trickContent;
    }

    /**
     * @param mixed $trickContent
     */
    public function setTrickContent($trickContent)
    {
        $this->trickContent = $trickContent;
    }

    /**
     * @return mixed
     */
    public function getTrickDate()
    {
        return $this->trickDate;
    }

    /**
     * @param mixed $trickDate
     */
    public function setTrickDate($trickDate)
    {
        $this->trickDate = $trickDate;
    }

    /**
     * @return mixed
     */
    public function getTrickUpdate()
    {
        return $this->trickUpdate;
    }

    /**
     * @param mixed $trickUpdate
     */
    public function setTrickUpdate($trickUpdate)
    {
        $this->trickUpdate = $trickUpdate;
    }

    public function setUser(Users $user)
    {
        $this->user = $user;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setGroup(Groups $group)
    {
        $this->group = $group;

        return $this;
    }

    public function getGroup()
    {
        return $this->group;
    }

}
