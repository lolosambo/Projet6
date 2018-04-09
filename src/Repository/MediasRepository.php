<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Repository;

use App\Entity\Medias;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Repository\Interfaces\MediasRepositoryInterface;

/**
 * Class MediasRepository.
 */
class MediasRepository extends ServiceEntityRepository implements MediasRepositoryInterface
{
    /**
     * MediasRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Medias::class);
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
        return $this->createQueryBuilder('m')
            ->where('m.id = ?1')
            ->setParameter(1, $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param $trickId
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findMediaALaUne($trickId)
    {
        return $this->createQueryBuilder('m')
            ->where('m.trickId = :trickId AND m.aLaUne = 1')
            ->setParameter(':trickId', $trickId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param $trickId
     *
     * @return mixed
     */
    public function findByTrick($trickId)
    {
        return $this->createQueryBuilder('m')
            ->where('m.trickId = :trickId')
            ->setParameter(':trickId', $trickId)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $url
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findByUrl($url)
    {
        return $this->createQueryBuilder('m')
            ->where('m.url = :url')
            ->setParameter(':url', $url)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteMedia($id)
    {
        return $this->createQueryBuilder('m')
            ->delete('App\Entity\Medias', 'm')
            ->where('m.id = :media_id')
            ->setParameter('media_id', $id)
            ->getQuery()
            ->execute();
    }

    /**
     * @param $medias
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save($medias)
    {
        $this->getEntityManager()->persist($medias);
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
