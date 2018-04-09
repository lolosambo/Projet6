<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Repository\Interfaces;

use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Interface MediasRepositoryInterface.
 */
interface MediasRepositoryInterface
{
    /**
     * MediasRepositoryInterface constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id);

    /**
     * @param $trickId
     *
     * @return mixed
     */
    public function findMediaALaUne($trickId);

    /**
     * @param $trickId
     *
     * @return mixed
     */
    public function findByTrick($trickId);

    /**
     * @param $url
     *
     * @return mixed
     */
    public function findByUrl($url);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function deleteMedia($id);

    /**
     * @param $medias
     *
     * @return mixed
     */
    public function save($medias);

    /**
     * @return mixed
     */
    public function flush();
}
