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

use App\Domain\Repository\Interfaces\GroupsRepositoryInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\Domain\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface TrickAddTypeHandlerInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface TrickAddTypeHandlerInterface
{
    /**
     * TrickAddTypeHandlerInterface constructor.
     *
     * @param SessionInterface          $session
     * @param TricksRepositoryInterface $tr
     * @param GroupsRepositoryInterface $gr
     * @param UsersRepositoryInterface  $ur
     */
    public function __construct(
        SessionInterface $session,
        TricksRepositoryInterface $tr,
        GroupsRepositoryInterface $gr,
        UsersRepositoryInterface $ur
    );

    /**
     * @param FormInterface $trickType
     *
     * @return mixed
     */
    public function handle(FormInterface $trickType);
}
