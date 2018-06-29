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
use App\Domain\Services\Interfaces\MailerServiceInterface;
use Swift_Mailer;
use Symfony\Component\Form\FormInterface;
use Twig\Environment;

/**
 * interface ForgotPasswordTypeHandlerInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface ForgotPasswordTypeHandlerInterface
{

    /**
     * ForgotPasswordTypeHandlerInterface constructor.
     *
     * @param UsersRepositoryInterface $usersRepository
     * @param Environment $twig
     */
    public function __construct(UsersRepositoryInterface $usersRepository, Environment $twig);


    /**
     * @param FormInterface $ForgotPasswordType
     *
     * @param MailerServiceInterface $mailer
     * @return mixed
     */
    public function handle(FormInterface $ForgotPasswordType, MailerServiceInterface $mailer);

}