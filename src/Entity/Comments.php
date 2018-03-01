<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 * @ORM\Table (name="Comments")
 */
class Comments
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
     * @ORM\Column(type="integer")
     */
    private $idUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentContent;

    /**
     * @ORM\Column(type="datetime")
     */
    private $commentDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $commentUpdate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tricks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trick;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    /**
     * @param mixed $commentContent
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;
    }

    /**
     * @return mixed
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param mixed $commentDate
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
     * @param mixed $commentUpdate
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
     * @param mixed $trick
     */
    public function setTrick(Tricks $trick)
    {
        $this->trick = $trick;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser(Users $user)
    {
        $this->user = $user;
    }



}
