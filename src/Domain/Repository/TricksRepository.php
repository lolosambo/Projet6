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

use App\Domain\Models\Tricks;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class TricksRepository.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class TricksRepository extends ServiceEntityRepository implements TricksRepositoryInterface
{
    /**
     * TricksRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tricks::class);
    }

    /**
     * @return mixed
     */
    public function findAllTricksWithMediasByDate()
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.images', 'ti', 'WITH', 'ti.aLaUne = 1')
            ->orderBy('t.trickUpdate')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param int $id
     *
     * @return mixed|null|object
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findTrick($id)
    {
        return $this->createQueryBuilder('t')
            ->where('t.id = ?1')
            ->setParameter(1, $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param $content
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByContent($content)
    {
        return $this->createQueryBuilder('t')
            ->where('t.content = ?1')
            ->setParameter(1, $content)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function deleteTrick($id)
    {
        return $this->createQueryBuilder('t')
            ->delete('App\Domain\Models\Tricks', 't')
            ->where('t.id = :trick_id')
            ->setParameter('trick_id', $id)
            ->getQuery()
            ->execute();
    }

    /**
     * @return mixed|void
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function flush()
    {
        $this->getEntityManager()->flush();
    }

    /**
     * @param $trick
     *
     * @return mixed|void
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save($trick)
    {
        $this->getEntityManager()->persist($trick);
        $this->getEntityManager()->flush();
    }
}
