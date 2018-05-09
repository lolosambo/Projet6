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
use App\Domain\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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
     * @param SessionInterface          $session
     * @param TricksRepositoryInterface $tr
     */
    public function __construct(
        SessionInterface $session,
        TricksRepositoryInterface $tr,
        UsersRepositoryInterface $ur
    );

    /**
     * @param FormInterface $updateTrickType
     * @param int           $trickId
     *
     * @return mixed
     */
    public function handle(FormInterface $updateTrickType, int $trickId);
}
