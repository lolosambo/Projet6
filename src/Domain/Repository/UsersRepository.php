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

namespace App\Domain\Repository;

use App\Domain\Models\Users;
use App\domain\Repository\Interfaces\UsersRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class UsersRepository.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class UsersRepository extends ServiceEntityRepository implements UsersRepositoryInterface
{
    /**
     * UsersRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Users::class);
    }

    /**
     * @param string $id
     *
     * @return mixed|null|object
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findUser(string $userId)
    {
        return $this->createQueryBuilder('u')
            ->where('u.id = ?1')
            ->setParameter(1, $userId)
            ->setCacheable(true)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param $pseudo
     * @param $password
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByPseudo($pseudo, $password)
    {
        return $this->createQueryBuilder('u')
            ->where('u.pseudo = :pseudo')
            ->setParameter('pseudo', $pseudo)
            ->andWhere('u.password = :password')
            ->setParameter('password', sha1($password))
            ->setCacheable(true)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param $pseudo
     * @param $mail
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByPseudoAndMail($pseudo, $mail)
    {
        return $this->createQueryBuilder('u')
            ->where('u.pseudo = :pseudo')
            ->setParameter('pseudo', $pseudo)
            ->andWhere('u.mail = :mail')
            ->setParameter('mail', $mail)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param $pseudo
     * @param $mail
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function verifyPseudoAndMail($pseudo, $mail)
    {
        return $this->createQueryBuilder('u')
            ->where('u.pseudo = :pseudo')
            ->setParameter('pseudo', $pseudo)
            ->orWhere('u.mail = :mail')
            ->setParameter('mail', $mail)
            ->getQuery()
            ->getResult();
    }


    /**
     * @param $user
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save($user)
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function flush()
    {
        $this->getEntityManager()->flush();
    }
}
