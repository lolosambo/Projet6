<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Domain\Repository\Interfaces;

use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Interface CommentsRepositoryInterface.
 */
interface CommentsRepositoryInterface
{
    /**
     * CommentsRepositoryInterface constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @param string  $id
     *
     * @return mixed
     */
    public function findByTrickId(string $id);

    /**
     * @param $comment
     *
     * @return mixed
     */
    public function save($comment);

    /**
     * @return mixed
     */
    public function flush();
}
