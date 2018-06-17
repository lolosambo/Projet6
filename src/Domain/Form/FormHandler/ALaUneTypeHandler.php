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

use App\Domain\Form\FormHandler\Interfaces\ALaUneTypeHandlerInterface;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class ALaUneTypeHandler.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ALaUneTypeHandler implements ALaUneTypeHandlerInterface
{
    /**
     * @var ImagesRepositoryInterface
     */
    private $imagesRepository;

    /**
     * ALaUneTypeHandler constructor.
     *
     * @param ImagesRepositoryInterface $imagesRepository
     */
    public function __construct(ImagesRepositoryInterface $imagesRepository)
    {
        $this->imagesRepository = $imagesRepository;
    }

    /**
     * @param FormInterface  $aLaUneType
     * @param string         $trickId
     *
     * @return bool
     */
    public function handle(FormInterface $aLaUneType, string $trickId)
    {
        if ($aLaUneType->isSubmitted() && $aLaUneType->isValid()) {
            $images = $this->imagesRepository->findByTrick($trickId);

            foreach ($images as $image) {
                $image->setALaUne(0);
            }
            $aLaUne = $this->imagesRepository->findByUrl($aLaUneType->getData()->aLaUne->getUrl());
            $aLaUne->setALaUne(1);
            $this->imagesRepository->flush();

            return true;
        }

        return false;
    }
}
