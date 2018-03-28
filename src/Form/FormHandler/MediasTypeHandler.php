<?php

namespace App\Form\FormHandler;

use App\DTO\MediasDTO;
use App\Entity\Medias;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;


class MediasTypeHandler implements MediasTypeHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var string
     */
    private $mediasPath;

    /**
     * MediasTypeHandler constructor.
     * @param EntityManagerInterface $em
     * @param $mediasPath
     */
    public function __construct(EntityManagerInterface $em, string $mediasPath)
    {
        $this->em = $em;
        $this->mediasPath = $mediasPath;
    }

    /**
     * @param FormInterface $mediasType
     * @param MediasDTO $dto
     * @param $trickId
     * @return bool
     */
    public function handle(FormInterface $mediasType, MediasDTO $dto, int $trickId)
    {

        if ($mediasType->isSubmitted() && $mediasType->isValid()) {

            $trick = $this->em->getRepository('App\Entity\Tricks')->find($trickId);
            $file = $dto->media;
            $extension = $file->guessExtension();
            $fileName = $file->getClientOriginalName ();
            $file->move($this->mediasPath, $fileName);

            dump($fileName);
            $media = new Medias($trickId, $dto->media);

            $media->setUrl($this->mediasPath);
            $media->setTrickId($trickId);
            $media->setUrl($fileName);
            $media->setTrick($trick);

            if (in_array($extension, ['jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'tiff', 'TIFF', 'gif', 'GIF', 'bmp', 'BMP'])) {
                $media->setType('Image');
            } elseif (in_array($extension, ['mp4', 'MP4', 'avi', 'AVI', 'mpeg', 'MPEG', 'flv', 'FLV', 'mkv', 'MKV'])) {
                $media->setType('Video');
            }

            if ($dto->aLaUne === true) {
                $media->setALaUne(true);
            }

            $this->em->persist($media);
            $this->em->flush();

            return true;
        }

        return false;

    }
}
