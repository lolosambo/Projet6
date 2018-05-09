<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Domain\Repository\Interfaces;

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
     * @return mixed
     */
    public function findAllTricksWithMediasByDate();

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findTrick($id);

    /**
     * @param $content
     *
     * @return mixed
     */
    public function findOneByContent($content);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteTrick($id);

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
