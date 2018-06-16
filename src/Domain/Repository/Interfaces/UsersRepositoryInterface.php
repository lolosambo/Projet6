<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Domain\Repository\Interfaces;

use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Interface UsersRepositoryInterface.
 */
interface UsersRepositoryInterface
{
    /**
     * UsersRepositoryInterface constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @param string  $id
     *
     * @return mixed
     */
    public function findUser(string $id);

    /**
     * @param $pseudo
     * @param $password
     *
     * @return mixed
     */
    public function findOneByPseudo($pseudo, $password);

    /**
     * @param $pseudo
     * @param $mail
     *
     * @return mixed
     */
    public function findOneByPseudoAndMail($pseudo, $mail);

    /**
     * @param $user
     *
     * @return mixed
     */
    public function save($user);

    /**
     * @return mixed
     */
    public function flush();
}
