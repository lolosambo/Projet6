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
use Symfony\Component\HttpFoundation\Request;

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
     * InscriptionTypeHandler constructor.
     *
     * @param UsersRepositoryInterface $usersRepository
     */
    public function __construct(
        UsersRepositoryInterface $usersRepository
    ) {
        $this->usersRepository = $usersRepository;
    }

    /**
     * @param Request $request
     * @param FormInterface $inscriptionType
     * @param MailerServiceInterface $mailer
     *
     * @return bool|mixed
     *
     * @throws \Exception
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function handle(
        Request $request,
        FormInterface $inscriptionType,
        MailerServiceInterface $mailer
    ) {
        if ($inscriptionType->isSubmitted() && $inscriptionType->isValid()) {
            $pseudo = $inscriptionType->getData()->pseudo;
            $mail = $inscriptionType->getData()->mail;
            $password = $inscriptionType->getData()->password;
            $user = new Users(
                $pseudo,
                sha1($password),
                $mail
            );
            $user->setInscrDate(new \DateTime('NOW'));

            if($this->usersRepository->verifyPseudoAndMail(
                $user->getPseudo(),
                $user->getMail()
            )) {
                throw new \Exception();
            }

            $this->usersRepository->save($user);
            $uuid = $this->usersRepository->findOneByPseudoAndMail($pseudo, $mail)
                ->getId()
                ->toString();
            $mailer(
                'Votre inscription sur le site communautaire Snowtricks',
                $mail,
                $pseudo,
                $uuid,
                'email_inscription.html.twig'
            );
            return true;
        }
        return false;
    }
}

