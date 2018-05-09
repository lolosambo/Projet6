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

use App\Domain\Models\Comments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Domain\Repository\Interfaces\CommentsRepositoryInterface;

/**
 * Class CommentsRepository.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
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
