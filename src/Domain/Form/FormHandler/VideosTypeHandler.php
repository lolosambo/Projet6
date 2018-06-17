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

use App\Domain\Form\FormHandler\Interfaces\VideosTypeHandlerInterface;
use App\Domain\Models\Videos;
use App\Domain\Repository\Interfaces\VideosRepositoryInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class VideosTypeHandler.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class VideosTypeHandler implements VideosTypeHandlerInterface
{
    /**
     * @var VideosRepositoryInterface
     */
    private $videosRepository;

    /**
     * @var TricksRepositoryInterface
     */
    private $tricksRepository;

    /**
     * VideosTypeHandler constructor.
     *
     * @param VideosRepositoryInterface $videosRepository
     * @param TricksRepositoryInterface $tricksRepository
     */
    public function __construct(
        VideosRepositoryInterface $videosRepository,
        TricksRepositoryInterface $tricksRepository
    )
    {
        $this->videosRepository = $videosRepository;
        $this->tricksRepository = $tricksRepository;
    }

    /**
     * @param FormInterface      $videosType
     * @param string                $trickId
     *
     * @return bool
     */
    public function handle(
        FormInterface $videosType,
        string $trickId
    ) {
        if ($videosType->isSubmitted() && $videosType->isValid()) {
            $addresses = [
                $videosType->getData()->address1,
                $videosType->getData()->address2,
                $videosType->getData()->address3,
                $videosType->getData()->address4,
            ];
            foreach ($addresses as $address) {
                if (null != $address) {
                    $media = new Videos();
                    $media->setTrick($this->tricksRepository->findTrick($trickId));
                    $media->setUrl($address);
                    $this->videosRepository->save($media);
                }
            }
            return true;
        }
        return false;
    }
}

