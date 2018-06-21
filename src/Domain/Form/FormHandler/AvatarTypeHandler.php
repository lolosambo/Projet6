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

use App\Domain\Form\FormHandler\Interfaces\AvatarTypeHandlerInterface;
use App\Domain\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class AvatarTypeHandler.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class AvatarTypeHandler implements AvatarTypeHandlerInterface
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var UsersRepositoryInterface
     */
    private $usersRepository;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var string  $avatarsPath
     */
    private $avatarsPath;

    /**
     * AvatarTypeHandler constructor.
     *
     * @param SessionInterface $session
     * @param TokenStorageInterface $tokenStorage
     * @param UsersRepositoryInterface $usersRepository
     * @param string $avatarsPath
     */
    public function __construct(
        SessionInterface $session,
        TokenStorageInterface $tokenStorage,
        UsersRepositoryInterface $usersRepository,
        string $avatarsPath
    ) {
        $this->session = $session;
        $this->tokenStorage = $tokenStorage;
        $this->usersRepository = $usersRepository;
        $this->avatarsPath = $avatarsPath;
    }

    /**
     * @param FormInterface  $avatarType
     *
     * @return bool
     */
    public function handle(FormInterface $avatarType)
    {
        if ($avatarType->isSubmitted() && $avatarType->isValid()) {
            $file = $avatarType->getData()->avatar;
            $avatarName = $file->getClientOriginalName();
            $avatarUrl = str_replace(' ', '_', $avatarName);
            $file->move(
                $this->avatarsPath,
                $avatarUrl
            );
            $user = $this->tokenStorage->getToken()->getUser();
            $user->setAvatar($avatarUrl);
            $this->usersRepository->flush();
            $this->session->set('avatar', $avatarUrl);
            return true;
        }
        return false;
    }
}
