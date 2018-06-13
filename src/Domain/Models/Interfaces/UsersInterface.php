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
 * Interface UsersInterface
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface UsersInterface
{

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getPseudo();

    /**
     * @param $pseudo
     *
     * @return mixed
     */
    public function setPseudo($pseudo);

    /**
     * @return mixed
     */
    public function getPassword();

    /**
     * @param $password
     *
     * @return mixed
     */
    public function setPassword($password);

    /**
     * @return mixed
     */
    public function getMail();

    /**
     * @param $mail
     *
     * @return mixed
     */
    public function setMail($mail);

    /**
     * @return mixed
     */
    public function getVerified();

    /**
     * @param int $verified
     *
     * @return mixed
     */
    public function setVerified(int $verified);

    /**
     * @return mixed
     */
    public function getInscrDate();

    /**
     * @param $inscrDate
     *
     * @return mixed
     */
    public function setInscrDate($inscrDate);

    /**
     * @return mixed
     */
    public function getAvatar();

    /**
     * @param $avatar
     *
     * @return mixed
     */
    public function setAvatar($avatar);

    /**
     * @return mixed
     */
    public function getRoles();

    /**
     * @return mixed
     */
    public function getSalt();

    /**
     * @return mixed
     */
    public function getUsername();

    /**
     * @return mixed
     */
    public function eraseCredentials();

    /**
     * @return mixed
     */
    public function serialize();

    /**
     * @param $serialized
     *
     * @return mixed
     */
    public function unserialize($serialized);
}
