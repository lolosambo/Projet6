<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\FormHandler;

use App\Repository\Interfaces\TricksRepositoryInterface;
use App\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface UpdateTrickTypeHandlerInterface.
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
