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

use App\Domain\Form\FormHandler\Interfaces\ImagesTypeHandlerInterface;
use App\Domain\Models\Images;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class ImagesTypeHandler.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ImagesTypeHandler implements ImagesTypeHandlerInterface
{
    /**
     * @var ImagesRepositoryInterface
     */
    private $imagesRepository;

    /**
     * @var TricksRepositoryInterface
     */
    private $tricksRepository;

    /**
     * @var string
     */
    private $imagesPath;

    /**
     * MediasTypeHandler constructor.
     *
     * @param ImagesRepositoryInterface $imagesRepository
     * @param string                    $imagesPath
     */
    public function __construct(
        ImagesRepositoryInterface $imagesRepository,
        TricksRepositoryInterface $tricksRepository,
        string $imagesPath
    ) {
        $this->imagesRepository = $imagesRepository;
        $this->tricksRepository = $tricksRepository;
        $this->imagesPath = $imagesPath;
    }

    /**
     * @param FormInterface  $imagesType
     * @param                $trickId
     *
     * @return bool
     */
    public function handle(
        FormInterface $imagesType,
        string $trickId
    ) {
        if ($imagesType->isSubmitted() && $imagesType->isValid()) {
            $trick = $this->tricksRepository->findTrick($trickId);

            $files = $imagesType->getData()->image;

            foreach ($files as $file) {
                $file->move(
                    $this->imagesPath,
                    $file->getClientOriginalName()
                );
                $image = new Images();
                $image->setUrl($this->imagesPath);
                $image->setTrick($trick);
                $image->setTrickId($trick->getId());
                $image->setUrl($file->getClientOriginalName());
                $this->imagesRepository->save($image);
            }
            return true;
        }
        return false;
    }
}

