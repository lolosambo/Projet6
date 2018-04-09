<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Repository;

use App\Entity\Users;
use App\Repository\Interfaces\UsersRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class UsersRepository.
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
     * @param mixed $id
     *
     * @return mixed|null|object
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function find($id)
    {
        return $this->createQueryBuilder('u')
            ->where('u.id = ?1')
            ->setParameter(1, $id)
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
            ->where('u.pseudo = :pseudo')->setParameter('pseudo', $pseudo)
            ->andWhere('u.password = :password')->setParameter('password', sha1($password))
            ->getQuery()
            ->getOneOrNullResult();
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
