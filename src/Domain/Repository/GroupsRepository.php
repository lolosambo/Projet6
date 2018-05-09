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

use App\Domain\Models\Groups;
use App\Domain\Repository\Interfaces\GroupsRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class GroupsRepository.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
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
