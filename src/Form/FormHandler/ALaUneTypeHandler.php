<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\FormHandler;

use App\DTO\Interfaces\ALAUneDTOInterface;
use App\Repository\Interfaces\MediasRepositoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class ALaUneTypeHandler.
 */
class ALaUneTypeHandler implements ALaUneTypeHandlerInterface
{
    /**
     * @var MediasRepositoryInterface
     */
    private $mr;

    /**
     * ALaUneTypeHandler constructor.
     *
     * @param MediasRepositoryInterface $mr
     */
    public function __construct(MediasRepositoryInterface $mr)
    {
        $this->mr = $mr;
    }

    /**
     * @param FormInterface      $aLaUneType
     * @param ALAUneDTOInterface $dto
     * @param int                $trickId
     *
     * @return bool
     */
    public function handle(FormInterface $aLaUneType, ALaUneDTOInterface $dto, int $trickId)
    {
        if ($aLaUneType->isSubmitted() && $aLaUneType->isValid()) {
            $medias = $this->mr->findByTrick($trickId);

            foreach ($medias as $media) {
                $media->setALaUne(0);
            }

            $aLaUne = $this->mr->findByUrl($dto->aLaUne->getUrl());
            dump($dto->aLaUne);
            $aLaUne->setALaUne(1);
            $this->mr->flush();

            return true;
        }

        return false;
    }
}
