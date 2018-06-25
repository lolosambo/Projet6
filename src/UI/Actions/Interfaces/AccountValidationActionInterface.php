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
namespace App\UI\Actions\Interfaces;

use App\Domain\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class AccountValidationActionInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface AccountValidationActionInterface
{
    /**
     * AccountValidationActionInterface constructor.
     *
     * @param UsersRepositoryInterface $usersRepository
     */
    public function __construct(UsersRepositoryInterface $usersRepository);


    /**
     * @param Request                $request
     * @param UrlGeneratorInterface  $urlGenerator
     *
     * @return mixed
     */
    public function __invoke(Request $request, UrlGeneratorInterface $urlGenerator);

}