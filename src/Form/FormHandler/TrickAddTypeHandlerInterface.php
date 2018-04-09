<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\FormHandler;

use App\DTO\Interfaces\TricksAddDTOInterface;
use App\Repository\Interfaces\GroupsRepositoryInterface;
use App\Repository\Interfaces\TricksRepositoryInterface;
use App\Repository\Interfaces\UsersRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface TrickAddTypeHandlerInterface.
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
     * @param FormInterface         $trickType
     * @param TricksAddDTOInterface $dto
     *
     * @return mixed
     */
    public function handle(
        Request $request,
        FormInterface $trickType,
        TricksAddDTOInterface $dto,
    ArrayCollection $collection
    );
}
