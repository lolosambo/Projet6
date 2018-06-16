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

namespace App\Domain\Form\FormHandler\Interfaces;

use Symfony\Component\Form\FormInterface;

/**
 * Interface ImagesTypeHandlerInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface ImagesTypeHandlerInterface
{
    /**
     * @param FormInterface      $imagesType
     * @param int                $trickId
     *
     * @return mixed
     */
    public function handle(
        FormInterface $imagesType,
        string $trickId
    );
}

