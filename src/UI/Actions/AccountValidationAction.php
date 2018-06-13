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
namespace App\UI\Actions;

use App\Domain\Repository\Interfaces\UsersRepositoryInterface;
use App\UI\Responders\Interfaces\AccountValidatedResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AccountValidationAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class AccountValidationAction
{
    /**
     * @var UsersRepositoryInterface
     */
    private $usersRepository;

    /**
     * AccountValidationAction constructor.
     *
     * @param UsersRepositoryInterface $usersRepository
     */
    public function __construct(UsersRepositoryInterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * @Route("/validation-compte/{id}", name="account-validation")
     */
    public function __invoke(Request $request, AccountValidatedResponderInterface $accountResponder)
    {
        $user = $this->usersRepository->findUser($request->get('id'));
        $user->setVerified(1);
        $this->usersRepository->save($user);
        return $accountResponder();
    }

}