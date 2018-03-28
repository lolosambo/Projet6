<?php

namespace App\Entity;
use Symfony\Component\Security\Core\User\UserInterface;


class Users implements UserInterface, \Serializable {

    private $id;

    private $pseudo;

    private $password;

    private $mail;

    private $verified;

    private $inscrDate;

    private $avatar = '../images/avatar.png';



    public function __construct($pseudo, $password, $mail) {
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->mail = $mail;
        $this->verified = 0;

    }


    public function getId()
    {
        return $this->id;
    }


    public function getPseudo()
    {
        return $this->pseudo;
    }


    public function setPseudo($pseudo)
    {
        if(is_string($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function getMail()
    {
        return $this->mail;
    }


    public function setMail($mail)
    {
        if (preg_match('#^([0-9a-zA-Z-_]+)@([0-9a-zA-Z-_]+).([a-z]+)$#', $mail)) {
           $this->mail = $mail;
           return true;
        } else {
            return false;
        }
    }


    public function getVerified()
    {
        return $this->verified;
    }


    public function setVerified($verified)
    {
        if(($verified == 0) || ($verified == 1)) {
            $this->verified = $verified;
            return true;
        } else {
            return false;
        }
    }


    public function getInscrDate()
    {
        return $this->inscrDate;
    }


    public function setInscrDate($inscrDate)
    {
        $this->inscrDate = $inscrDate;
    }


    public function getAvatar()
    {
        return $this->avatar;
    }


    public function setAvatar($avatar)
    {
        if(preg_match('#^\.\./uploads/avatars/([0-9a-zA-Z-_]+)\.jpg|jpeg|png$#', $avatar)) {
            $this->avatar = $avatar;
        } else {
            $this->avatar = '../images/avatar.png';
        }
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getSalt()
    {
        return $this->password;
    }

    public function getUsername()
    {
        return $this->pseudo;
    }
    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->pseudo,
            $this->password,
            $this->mail
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->pseudo,
            $this->password,
            $this->mail
            ) = unserialize($serialized);
    }


}
