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

namespace App\Domain\Repository\Interfaces;

use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Interface ImagesRepositoryInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface VideosRepositoryInterface
{
    /**
     * VideosRepositoryInterface constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @param string  $trickId
     *
     * @return mixed
     */
    public function findVideosByTrickId(string $trickId);

    /**
     * @param string  $id
     *
     * @return mixed
     */
    public function deleteVideo(string $id);

    /**
     * @return mixed
     */
    public function flush();

    /**
     * @param $image
     *
     * @return mixed
     */
    public function save($image);


}