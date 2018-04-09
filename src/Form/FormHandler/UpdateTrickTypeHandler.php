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
 * Class UpdateTrickTypeHandler.
 */
class UpdateTrickTypeHandler implements UpdateTrickTypeHandlerInterface
{
    /**
     * @var TricksRepositoryInterface
     */
    private $tr;

    /**
     * @var UsersRepositoryInterface
     */
    private $ur;

    /**
     * @var SessionInterface
     */
    private $session;

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
    ) {
        $this->tr = $tr;
        $this->ur = $ur;
        $this->session = $session;
    }

    /**
     * @param UpdateTrickTypeHandlerInterface $formType
     */
    public function handle(FormInterface $updateTrickType, int $trickId)
    {
        if ($updateTrickType->isSubmitted() && $updateTrickType->isValid()) {
            $user = $this->ur->find($this->session->get('userId'));
            $newTrick = $this->tr->find($trickId);
            $newTrick->setUser($user);
            $newTrick->setTrickUpdate(new \DateTime('NOW'));
            $this->tr->flush();

            return true;
        }

        return false;
    }
}
