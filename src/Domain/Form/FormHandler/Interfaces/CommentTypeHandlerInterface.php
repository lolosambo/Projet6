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
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface CommentTypeHandlerInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface CommentTypeHandlerInterface
{
    /**
     * @param FormInterface $commentType
     * @param $trickId
     */
    public function handle(
        Request $request,
        FormInterface $commentType
    );
}

