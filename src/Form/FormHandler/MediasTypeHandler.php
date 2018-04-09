<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\FormHandler;

use App\DTO\Interfaces\MediasDTOInterface;
use App\Entity\Medias;
use App\Repository\Interfaces\MediasRepositoryInterface;
use App\Repository\Interfaces\TricksRepositoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class MediasTypeHandler.
 */
class MediasTypeHandler implements MediasTypeHandlerInterface
{
    /**
     * @var MediasRepositoryInterface
     */
    private $mr;

    /**
     * @var TricksRepositoryInterface
     */
    private $tr;

    /**
     * @var string
     */
    private $mediasPath;

    /**
     * MediasTypeHandler constructor.
     *
     * @param MediasRepositoryInterface $mr
     * @param string                    $mediasPath
     */
    public function __construct(
        MediasRepositoryInterface $mr,
        TricksRepositoryInterface $tr,
        string $mediasPath
    ) {
        $this->mr = $mr;
        $this->tr = $tr;
        $this->mediasPath = $mediasPath;
    }

    /**
     * @param FormInterface      $mediasType
     * @param MediasDTOInterface $dto
     * @param $trickId
     *
     * @return bool
     */
    public function handle(
        FormInterface $mediasType,
        MediasDTOInterface $dto,
        int $trickId
    ) {
        if ($mediasType->isSubmitted() && $mediasType->isValid()) {
            $trick = $this->tr->find($trickId);
            $files = $dto->media;
            foreach ($files as $file) {
                $extension = $file->guessExtension();
                $file->move(
                    $this->mediasPath,
                    $file->getClientOriginalName()
                );
                $media = new Medias($trickId, $dto->media);
                $media->setUrl($this->mediasPath);
                $media->setTrick($trick);
                $media->setUrl($file->getClientOriginalName());

                if (in_array($extension,
                    ['jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'tiff', 'TIFF', 'gif', 'GIF', 'bmp', 'BMP']
                )) {
                    $media->setType('Image');
                } elseif (in_array($extension,
                    ['mp4', 'MP4', 'avi', 'AVI', 'mpeg', 'MPEG', 'flv', 'FLV', 'mkv', 'MKV']
                )) {
                    $media->setType('Video');
                }
                $this->mr->save($media);
            }

            return true;
        }

        return false;
    }
}
