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

use App\Domain\Form\FormHandler\Interfaces\InscriptionTypeHandlerInterface;
use App\Domain\Models\Users;
use App\Domain\Repository\Interfaces\UsersRepositoryInterface;
use App\Domain\Services\Interfaces\MailerServiceInterface;
use Symfony\Component\Form\FormInterface;
use Twig\Environment;

/**
 * Class InscriptionTypeHandler.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class InscriptionTypeHandler implements InscriptionTypeHandlerInterface
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
     * InscriptionTypeHandler constructor.
     *
     * @param UsersRepositoryInterface    $userRepository
     */
    public function __construct(UsersRepositoryInterface $usersRepository, Environment $twig)
    {
        $this->usersRepository = $usersRepository;
        $this->twig = $twig;
    }

    /**
     * @param FormInterface $inscriptionType
     * @param Swift_Mailer $mailer
     *
     * @return bool
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function handle(FormInterface $inscriptionType, MailerServiceInterface $mailer)
    {
        if ($inscriptionType->isSubmitted() && $inscriptionType->isValid()) {
            $user = new Users(
                $inscriptionType->getData()->pseudo,
                sha1($inscriptionType->getData()->password),
                $inscriptionType->getData()->mail
            );
            $user->setInscrDate(new \DateTime('NOW'));
            $this->usersRepository->save($user);
            $uuid = $this->usersRepository->findOneByPseudoAndMail(
                $inscriptionType->getData()->pseudo,
                $inscriptionType->getData()->mail
            )->getId()->toString();

            $mailer(
                'Votre inscription sur le site communautaire Snowtricks',
                $inscriptionType->getData()->mail,
                $inscriptionType->getData()->pseudo,
                $uuid,
                'email_inscription.html.twig');
            return true;
        }
        return false;
    }
}

