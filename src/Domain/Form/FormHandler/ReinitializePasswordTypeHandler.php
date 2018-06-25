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

use App\Domain\Form\FormHandler\Interfaces\ReinitializePasswordTypeHandlerInterface;
use App\Domain\Repository\Interfaces\UsersRepositoryInterface;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

/**
 * class ReinitializePasswordTypeHandler
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ReinitializePasswordTypeHandler implements ReinitializePasswordTypeHandlerInterface
{
    /**
     * @var UsersRepositoryInterface
     */
    private $usersRepository;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * ReinitializePasswordTypeHandler constructor.
     *
     * @param UsersRepositoryInterface $userRepository
     */
    public function __construct(UsersRepositoryInterface $usersRepository, Environment $twig)
    {
        $this->usersRepository = $usersRepository;
        $this->twig = $twig;
    }

    /**
     * @param Request $request
     * @param FormInterface $reinitializePasswordType
     * @return bool
     */
    public function handle(FormInterface $reinitializePasswordType, Request $request)
    {
        if ($reinitializePasswordType->isSubmitted() && $reinitializePasswordType->isValid()) {
            $user = $this->usersRepository->findUser($request->get('id'));
            $user->setPassword(sha1($reinitializePasswordType->getData()->password));
            $this->usersRepository->flush();
            return true;
        }
        return false;
    }
}
