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
 * Interface ALaUneTypeHandlerInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface ALaUneTypeHandlerInterface
{
    /**
     * @param FormInterface $aLaUneType
     * @param string $trickId
     *
     * @return mixed
     */
    public function handle(FormInterface $aLaUneType, string $trickId);
}
