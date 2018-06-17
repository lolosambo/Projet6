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

use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use Symfony\Component\Form\FormInterface;


/**
 * Interface UpdateTrickTypeHandlerInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface UpdateTrickTypeHandlerInterface
{
    /**
     * UpdateTrickTypeHandler constructor.
     *
     * @param TricksRepositoryInterface $tr
     */
    public function __construct(TricksRepositoryInterface $tricksRepository);

    /**
     * @param FormInterface $updateTrickType
     * @param string        $trickId
     *
     * @return mixed
     */
    public function handle(FormInterface $updateTrickType, string $trickId);
}
