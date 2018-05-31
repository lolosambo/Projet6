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

use App\Domain\Form\FormHandler\Interfaces\UpdateTrickTypeHandlerInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\Domain\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class UpdateTrickTypeHandler.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
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
            $newTrick = $this->tr->find($trickId);
            $newTrick->setTrickUpdate(new \DateTime('NOW'));
            $this->tr->flush();
            return true;
        }
        return false;
    }
}

