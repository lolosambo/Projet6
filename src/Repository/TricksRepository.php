<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Tricks;
use App\Repository\Interfaces\TricksRepositoryInterface;
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
            ->leftJoin('t.medias', 'tm', 'WITH', 't.id = tm.trickId AND tm.aLaUne = 1')
            ->addSelect('tm')
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
    public function find($id)
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
            ->delete('App\Entity\Tricks', 't')
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
