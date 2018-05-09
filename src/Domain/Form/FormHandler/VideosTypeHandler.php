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
    private $vr;

    /**
     * @var TricksRepositoryInterface
     */
    private $tr;

    /**
     * VideosTypeHandler constructor.
     *
     * @param VideosRepositoryInterface $mr
     * @param TricksRepositoryInterface $tr
     */
    public function __construct(VideosRepositoryInterface $vr, TricksRepositoryInterface $tr)
    {
        $this->vr = $vr;
        $this->tr = $tr;
    }

    /**
     * @param FormInterface      $videosType
     * @param int                $trickId
     *
     * @return bool
     */
    public function handle(
        FormInterface $videosType,
        int $trickId
    ) {
        $trick = $this->tr->find($trickId);

        if ($videosType->isSubmitted() && $videosType->isValid()) {
            $addresses = [
                $videosType->getData()->address1,
                $videosType->getData()->address2,
                $videosType->getData()->address3,
                $videosType->getData()->address4,
            ];

            foreach ($addresses as $address) {
                if (null != $address) {
                    $media = new Videos($trickId, $address);
                    $media->setTrickId($trickId);
                    $media->setTrick($trick);
                    $media->setUrl($address);
                    $this->vr->save($media);
                }
            }

            return true;
        }

        return false;
    }
}
