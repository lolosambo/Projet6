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

namespace App\Domain\Form\FormHandler;

use App\Domain\Form\FormHandler\Interfaces\TrickAddTypeHandlerInterface;
use App\Domain\Models\Images;
use App\Domain\Models\Tricks;
use App\Domain\Models\Videos;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\Domain\Repository\Interfaces\VideosRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class TrickTypeHandler.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class TrickTypeHandler implements TrickAddTypeHandlerInterface
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var TricksRepositoryInterface
     */
    private $tricksRepository;

    /**
     * @var ImagesRepositoryInterface
     */
    private $imagesRepository;

    /**
     * @var VideosRepositoryInterface
     */
    private $videosRepository;

    /**
     * @var string
     */
    private $imagesPath;

    /**
     * TrickTypeHandler constructor.
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
    )
    {
        $this->tokenStorage = $tokenStorage;
        $this->tricksRepository = $tricksRepository;
        $this->imagesRepository = $imagesRepository;
        $this->videosRepository = $videosRepository;
        $this->imagesPath = $imagesPath;
    }

    /**
     * @param FormInterface $trickType
     *
     * @return bool|mixed
     */
    public function handle(FormInterface $trickType)
    {
        if ($trickType->isSubmitted() && $trickType->isValid()) {
            $newTrick = new Tricks(
                $trickType->getData()->name,
                $trickType->getData()->group->getId()->toString(),
                $trickType->getData()->content
            );
            $user = $this->tokenStorage->getToken()->getUser();
            $newTrick->setUser($user);
            $newTrick->setGroup($trickType->getData()->group);
            $newTrick->setTrickDate(new \DateTime('NOW'));
            $newTrick->setTrickUpdate(new \DateTime('NOW'));
            $this->tricksRepository->save($newTrick);
            $trick = $this->tricksRepository->findOneByName($trickType->getData()->name);
            $files = $trickType->getData()->image;

            foreach ($files as $file) {
                $file->move(
                    $this->imagesPath,
                    $file->getClientOriginalName()
                );
                $newImage = new Images();
                $newImage->setTrick($trick);
                if ($file == $files[0]) {
                    $newImage->setALaUne(1);
                } else {
                    $newImage->setALaUne(0);
                }

                $newImage->setTrickId($trick->getId());
                $newImage->setUrl($file->getClientOriginalName());

                $this->imagesRepository->save($newImage);
            }
            $addresses = [
                $trickType->getData()->address1,
                $trickType->getData()->address2,
                $trickType->getData()->address3,
                $trickType->getData()->address4
            ];

            foreach ($addresses as $address) {
                if (null != $address) {
                    $media = new Videos();
                    $media->setTrick($trick);
                    $media->setUrl($address);
                    $this->videosRepository->save($media);
                }
            }
            return true;
        }
        return false;
    }
}

