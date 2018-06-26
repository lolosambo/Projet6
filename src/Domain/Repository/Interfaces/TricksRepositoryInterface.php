<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Domain\Repository\Interfaces;

use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\CacheProvider;
use Ramsey\Uuid\UuidInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
 * Interface TricksRepositoryInterface.
 */
interface TricksRepositoryInterface
{
    /**
     * TricksRepositoryInterface constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @param Cache $cache
     *
     * @return mixed
     */
    public function findAllTricksWithMediasByDate();

    /**
     * @param string  $id
     *
     * @return mixed
     */
    public function findTrick(string $id);

    /**
     * @param string  $slug
     *
     * @return mixed
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findTrickDetails(string $slug);

    /**
     * @param string  $content
     *
     * @return mixed
     */
    public function findOneByName(string $Name);

    /**
     * @param string  $id
     *
     * @return mixed
     */
    public function deleteTrick(string $id);

    /**
     * @return mixed
     */
    public function flush();

    /**
     * @param $trick
     *
     * @return mixed
     */
    public function save($trick);
}
