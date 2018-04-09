<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Repository;

use App\Entity\Groups;
use App\Repository\Interfaces\GroupsRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class GroupsRepository.
 */
class GroupsRepository extends ServiceEntityRepository implements GroupsRepositoryInterface
{
    /**
     * GroupsRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Groups::class);
    }

    /**
     * @param $group
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByGroup($group)
    {
        return $this->createQueryBuilder('g')
            ->where('g.group = ?1')
            ->setParameter(1, $group)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
