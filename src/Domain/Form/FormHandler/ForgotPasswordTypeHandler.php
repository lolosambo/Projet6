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

use App\Domain\Form\FormHandler\Interfaces\ForgotPasswordTypeHandlerInterface;
use App\Domain\Repository\Interfaces\UsersRepositoryInterface;
use App\Domain\Services\Interfaces\MailerServiceInterface;
use Swift_Image;
use Swift_Mailer;
use Swift_Message;
use Symfony\Component\Form\FormInterface;
use Twig\Environment;

/**
 * Class InscriptionTypeHandler.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ForgotPasswordTypeHandler implements ForgotPasswordTypeHandlerInterface
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
     * ForgotPasswordTypeHandler constructor.
     *
     * @param UsersRepositoryInterface $userRepository
     */
    public function __construct(UsersRepositoryInterface $usersRepository, Environment $twig)
    {
        $this->usersRepository = $usersRepository;
        $this->twig = $twig;
    }

    /**
     * @param FormInterface $forgotPasswordType
     * @param Swift_Mailer $mailer
     *
     * @return bool
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function handle(FormInterface $forgotPasswordType, MailerServiceInterface $mailer)
    {
        if ($forgotPasswordType->isSubmitted() && $forgotPasswordType->isValid()) {
            $user = $this->usersRepository->findOneByPseudoAndMail(
                $forgotPasswordType->getData()->pseudo,
                $forgotPasswordType->getData()->mail
            );
            $mailer(
                'Réinitialisation du mot de passe Snowtricks',
                $forgotPasswordType->getData()->mail,
                $forgotPasswordType->getData()->pseudo,
                $user->getid()->toString(),
                'email_reinitialisation.html.twig');
            return true;
        }
        return false;
    }
}
