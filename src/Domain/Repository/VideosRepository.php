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

use App\Domain\Models\Videos;
use App\Domain\Repository\Interfaces\VideosRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class ImagesRepository
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class VideosRepository extends ServiceEntityRepository implements VideosRepositoryInterface
{
    /**
     * VideosRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Videos::class);
    }

    /**
     * @param $trickId
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findVideosByTrickId($trickId)
    {
        return $this->createQueryBuilder('v')
            ->where('v.trickId = :trickId')
            ->setParameter(':trickId', $trickId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param int $id
     *
     * @return \Doctrine\ORM\QueryBuilder|mixed
     */
    public function deleteVideo(int $id)
    {
        return $this->createQueryBuilder('v')
            ->delete('App\Domain\Models\Videos', 'v')
            ->where('v.id = :id')
            ->setParameter('id', $id)
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
     * @param $video
     *
     * @return mixed|void
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save($video)
    {
        $this->getEntityManager()->persist($video);
        $this->getEntityManager()->flush();
    }
}

