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
interface ImagesRepositoryInterface
{
    /**
     * ImagesRepositoryInterface constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @param int $trickId
     *
     * @return mixed
     */
    public function findImageALaUne(int $trickId);

    /**
     * @param string $url
     *
     * @return mixed
     */
    public function findByUrl(string $url);

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function findById(int $id);

    /**
     * @param $image
     *
     * @return mixed
     */
    public function deleteImage(int $id);

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

