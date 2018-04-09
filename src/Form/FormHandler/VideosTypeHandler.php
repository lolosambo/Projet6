<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\FormHandler;

use App\DTO\Interfaces\VideosDTOInterface;
use App\Entity\Medias;
use App\Repository\Interfaces\MediasRepositoryInterface;
use App\Repository\Interfaces\TricksRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class VideosTypeHandler.
 */
class VideosTypeHandler implements VideosTypeHandlerInterface
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
     * MediasTypeHandler constructor.
     *
     * @param EntityManagerInterface $em
     * @param $mediasPath
     */
    public function __construct(MediasRepositoryInterface $mr, TricksRepositoryInterface $tr)
    {
        $this->mr = $mr;
        $this->tr = $tr;
    }

    /**
     * @param FormInterface      $videosType
     * @param VideosDTOInterface $dto
     * @param int                $trickId
     *
     * @return bool
     */
    public function handle(
        FormInterface $videosType,
        VideosDTOInterface $dto,
        int $trickId
    ) {
        $trick = $this->tr->find($trickId);

        if ($videosType->isSubmitted() && $videosType->isValid()) {
            $addresses = [
                $dto->address1,
                $dto->address2,
                $dto->address3,
                $dto->address4,
            ];

            foreach ($addresses as $address) {
                if (null != $address) {
                    $media = new Medias($trickId, $address);
                    $media->setTrickId($trickId);
                    $media->setType('Video');
                    $media->setTrick($trick);
                    $media->setUrl($address);
                    $this->mr->save($media);
                }
            }

            return true;
        }

        return false;
    }
}
