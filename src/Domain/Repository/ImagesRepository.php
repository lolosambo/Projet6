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
use App\Domain\Models\Interfaces\ImagesInterface;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

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
     * @param string  $trickId
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findImageALaUne(string $slug)
    {
        return $this->createQueryBuilder('i')
            ->leftJoin('i.trick', 'it')
            ->where('it.slug = :slug')
            ->andWhere('i.aLaUne = 1')
            ->setParameter(':slug', $slug)
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
     * @param string  $id
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findById(string $imageId)
    {
        return $this->createQueryBuilder('i')
            ->where('i.id = :id')
            ->setParameter(':id', $imageId)
            ->setCacheable(true)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param string  $id
     *
     * @return \Doctrine\ORM\QueryBuilder|mixed
     */
    public function deleteImage(string $imageId)
    {
        return $this->createQueryBuilder('t')
            ->delete('App\Domain\Models\Images', 'i')
            ->where('i.id = :id')
            ->setParameter('id', $imageId)
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
     * @param ImagesInterface $image
     *
     * @return mixed|void
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(ImagesInterface $image)
    {
        $this->getEntityManager()->persist($image);
        $this->getEntityManager()->flush();
    }

}