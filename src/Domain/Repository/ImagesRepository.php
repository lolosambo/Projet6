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

use App\Domain\Models\Images;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Tests\CacheWarmer\testRouterInterfaceWithoutWarmebleInterface;

/**
 * Class ImagesRepository
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ImagesRepository extends ServiceEntityRepository implements ImagesRepositoryInterface
{
    /**
     * MediasRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Images::class);
    }

    /**
     * @param int $trickId
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findImageALaUne(int $trickId)
    {
        return $this->createQueryBuilder('i')
            ->where('i.trickId = :trickId AND i.aLaUne = 1')
            ->setParameter(':trickId', $trickId)
            ->setCacheable(true)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param string $url
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findByUrl(string $url)
    {
        return $this->createQueryBuilder('i')
            ->where('i.url = :url')
            ->setParameter(':url', $url)
            ->setCacheable(true)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param int $id
     *
     * @return \Doctrine\ORM\QueryBuilder|mixed
     */
    public function deleteImage(int $id)
    {
        return $this->createQueryBuilder('t')
            ->delete('App\Domain\Models\Images', 'i')
            ->where('i.id = :id')
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
     * @param $image
     *
     * @return mixed|void
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save($image)
    {
        $this->getEntityManager()->persist($image);
        $this->getEntityManager()->flush();
    }

}