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

use App\Domain\Models\Interfaces\UsersInterface;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class Users.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class Users implements UserInterface, \Serializable, UsersInterface
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $pseudo;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var int boolean
     */
    private $verified;

    /**
     * @var \DateTime
     */
    private $inscrDate;

    /**
     * @var string string
     */
    private $avatar;

    /**
     * Users constructor.
     *
     * @param string $pseudo
     * @param string $password
     * @param string $mail
     */
    public function __construct(
        string $pseudo,
        string $password,
        string $mail
    ) {
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->mail = $mail;
        $this->verified = 0;
    }

    /**
     * @return UuidInterface
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param $pseudo
     */
    public function setPseudo($pseudo)
    {
        if (is_string($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param $mail
     *
     * @return bool
     */
    public function setMail($mail)
    {
        if (preg_match('#^([0-9a-zA-Z-_]+)@([0-9a-zA-Z-_]+).([a-z]+)$#', $mail)) {
            $this->mail = $mail;

            return true;
        } else {
            return false;
        }
    }

    /**
     * @return int
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * @param int $verified
     *
     * @return bool|mixed
     */
    public function setVerified(int $verified)
    {
        if (1 == $verified) {
            $this->verified = $verified;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \DateTime
     */
    public function getInscrDate()
    {
        return $this->inscrDate;
    }

    /**
     * @param $inscrDate
     */
    public function setInscrDate($inscrDate)
    {
        $this->inscrDate = $inscrDate;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param $avatar
     */
    public function setAvatar($avatar)
    {
        if (preg_match('#^\.\./uploads/avatars/([0-9a-zA-Z-_]+)\.jpg|jpeg|png$#', $avatar)) {
            $this->avatar = $avatar;
        }
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * @return null|string
     */
    public function getSalt()
    {
        return $this->password;
    }

    /**
     * @return string
     */
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
        return serialize([
            $this->id,
            $this->pseudo,
            $this->password,
            $this->mail,
        ]);
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->pseudo,
            $this->password,
            $this->mail
            ) = unserialize($serialized);
    }
}
