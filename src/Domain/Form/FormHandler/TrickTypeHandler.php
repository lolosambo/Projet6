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

use App\Domain\DTO\Interfaces\TricksAddDTOInterface;
use App\Domain\Form\FormHandler\Interfaces\TrickAddTypeHandlerInterface;
use App\Domain\Models\Tricks;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\Domain\Repository\Interfaces\GroupsRepositoryInterface;
use App\Domain\Repository\Interfaces\UsersRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class TrickTypeHandler.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class TrickTypeHandler implements TrickAddTypeHandlerInterface
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var TricksRepositoryInterface
     */
    private $tr;

    /**
     * @var GroupsRepositoryInterface
     */
    private $gr;

    /**
     * @var UsersRepositoryInterface
     */
    private $ur;

    /**
     * TrickTypeHandler constructor.
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
    ) {
        $this->tr = $tr;
        $this->gr = $gr;
        $this->ur = $ur;
        $this->session = $session;
    }

    /**
     * @param FormInterface $trickType
     *
     * @return bool|mixed
     */
    public function handle(FormInterface $trickType)
    {
        if ($trickType->isSubmitted() && $trickType->isValid()) {
            $trick = new Tricks(
                $trickType->getData()->name,
                $trickType->getData()->group->getId(),
                $trickType->getData()->content
            );
            $userId = $this->session->get('userId');
            $user = $this->ur->find($userId);
            $group = $this->gr->findOneByGroup($trickType->getData()->group->getName());

            $trick->setUser($user);
            $trick->setName($group);
            $trick->setTrickDate(new \DateTime('NOW'));
            $trick->setTrickUpdate(new \DateTime('NOW'));
            $this->tr->save($trick);

            return true;
        }
        return false;
    }
}

