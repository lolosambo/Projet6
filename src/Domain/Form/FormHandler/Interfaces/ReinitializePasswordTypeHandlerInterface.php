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
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

/**
 * class ReinitializePasswordTypeHandlerInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface ReinitializePasswordTypeHandlerInterface
{
    /**
     * ReinitializePasswordTypeHandlerInterface constructor.
     *
     * @param UsersRepositoryInterface $userRepository
     */
    public function __construct(UsersRepositoryInterface $usersRepository, Environment $twig);


    /**
     * @param Request        $request
     * @param FormInterface  $form
     *
     * @return bool
     */
    public function handle(FormInterface $form, Request $request);
}

