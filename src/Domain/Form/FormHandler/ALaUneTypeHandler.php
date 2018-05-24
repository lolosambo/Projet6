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
    private $ir;

    /**
     * ALaUneTypeHandler constructor.
     *
     * @param ImagesRepositoryInterface $mr
     */
    public function __construct(ImagesRepositoryInterface $ir)
    {
        $this->ir = $ir;
    }

    /**
     * @param FormInterface      $aLaUneType
     * @param int                $trickId
     *
     * @return bool
     */
    public function handle(FormInterface $aLaUneType, int $trickId)
    {
        if ($aLaUneType->isSubmitted() && $aLaUneType->isValid()) {
            $images = $this->ir->findByTrick($trickId);

            foreach ($images as $image) {
                $image->setALaUne(0);
            }
            $aLaUne = $this->ir->findByUrl($aLaUneType->getData()->aLaUne->getUrl());
            $aLaUne->setALaUne(1);
            $this->ir->flush();

            return true;
        }

        return false;
    }
}
