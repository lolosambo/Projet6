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
                ->setCacheable(true)
                ->getQuery()
                ->useResultCache(true)
                ->useQueryCache(true)
                ->getResult();
    }

    /**
     * @param string  $slug
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findTrick(string $slug)
    {
        return $this->createQueryBuilder('t')
            ->where('t.slug = ?1')
            ->setParameter(1, $slug)
            ->setCacheable(true)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param string  $slug
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findTrickDetails(string $slug)
    {
        return $this->createQueryBuilder('t')
            ->where('t.slug = ?1')
            ->leftJoin('t.images', 'ti', 'WITH', 'ti.trickId = t.id')
            ->leftJoin('t.comments', 'tc', 'WITH', 'tc.trickId = t.id')
            ->leftJoin('t.videos', 'tv', 'WITH', 'tv.trickId = t.id')
            ->setParameter(1, $slug)
            ->setCacheable(true)
            ->getQuery()
            ->useResultCache(true)
            ->useQueryCache(true)
            ->getOneOrNullResult();
    }

    /**
     * @param string  $content
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByName(string $name)
    {
        return $this->createQueryBuilder('t')
            ->where('t.name = ?1')
            ->setParameter(1, $name)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function deleteTrick(string $slug)
    {
        return $this->createQueryBuilder('t')
            ->delete('App\Domain\Models\Tricks', 't')
            ->where('t.slug = :slug')
            ->setParameter('slug', $slug)
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
