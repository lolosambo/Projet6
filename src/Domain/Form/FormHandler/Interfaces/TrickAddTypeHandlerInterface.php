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

namespace App\Domain\Form\FormHandler\Interfaces;


use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\Domain\Repository\Interfaces\VideosRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Interface TrickAddTypeHandlerInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface TrickAddTypeHandlerInterface
{
    /**
     * TrickAddTypeHandlerInterface constructor.
     *
     * @param TokenStorageInterface $tokenStorage
     * @param TricksRepositoryInterface $tricksRepository
     * @param ImagesRepositoryInterface $imagesRepository
     * @param VideosRepositoryInterface $videosRepository
     */
    public function __construct(
        TokenStorageInterface $tokenStorage,
        TricksRepositoryInterface $tricksRepository,
        ImagesRepositoryInterface $imagesRepository,
        VideosRepositoryInterface $videosRepository,
        string $imagesPath
    );

    /**
     * @param FormInterface $trickType
     *
     * @return mixed
     */
    public function handle(FormInterface $trickType);
}
