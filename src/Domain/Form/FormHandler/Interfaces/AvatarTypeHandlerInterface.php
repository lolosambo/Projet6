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

use App\Domain\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class AvatarTypeHandler.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface AvatarTypeHandlerInterface
{
    /**
     * AvatarTypeHandlerInterface constructor.
     * 
     * @param TokenStorageInterface $tokenStorage
     * @param UsersRepositoryInterface $usersRepository
     * @param string $avatarsPath
     */
    public function __construct(
        SessionInterface $session,
        TokenStorageInterface $tokenStorage,
        UsersRepositoryInterface $usersRepository,
        string $avatarsPath
    );

    /**
     * @param FormInterface  $avatarType
     *
     * @return bool
     */
    public function handle(FormInterface $avatarType);

}