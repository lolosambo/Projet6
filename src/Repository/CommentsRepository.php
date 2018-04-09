<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Repository;

use App\Entity\Comments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Repository\Interfaces\CommentsRepositoryInterface;

/**
 * Class CommentsRepository.
 */
class CommentsRepository extends ServiceEntityRepository implements CommentsRepositoryInterface
{
    /**
     * CommentsRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comments::class);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findByTrickId($id)
    {
        return $this->createQueryBuilder('c')
            ->where('c.trickId = :trick_id')
            ->setParameter(':trick_id', $id)
            ->orderBy('c.commentDate', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $comment
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save($comment)
    {
        $this->getEntityManager()->persist($comment);
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
