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

use App\Domain\Models\Interfaces\ImagesInterface;
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
     * @param string $trickId
     *
     * @return mixed
     */
    public function findImageALaUne(string $trickId);

    /**
     * @param string $url
     *
     * @return mixed
     */
    public function findByUrl(string $url);

    /**
     * @param string  $id
     *
     * @return mixed
     */
    public function findById(string $id);

    /**
     * @param string  $id
     *
     * @return mixed
     */
    public function deleteImage(string $id);

    /**
     * @return mixed
     */
    public function flush();

    /**
     * @param ImagesInterface $image
     *
     * @return mixed
     */
    public function save(ImagesInterface $image);
}

