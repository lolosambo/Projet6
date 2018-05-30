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
use Swift_Mailer;
use Swift_Message;
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
    private $ur;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * InscriptionTypeHandler constructor.
     *
     * @param UsersRepositoryInterface    $ur
     */
    public function __construct(UsersRepositoryInterface $ur, Environment $twig)
    {
        $this->ur = $ur;
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
    public function handle(FormInterface $inscriptionType, Swift_Mailer $mailer)
    {
        if ($inscriptionType->isSubmitted() && $inscriptionType->isValid()) {
            $user = new Users(
                $inscriptionType->getData()->pseudo,
                sha1($inscriptionType->getData()->password),
                $inscriptionType->getData()->mail
            );
            $user->setInscrDate(new \DateTime('NOW'));
            $this->ur->save($user);

            $message = (new Swift_Message('Nouvelle inscription'))
                ->setFrom('lolosambo2@gmail.com')
                ->setTo($inscriptionType->getData()->mail)
                ->setBody($this->twig->render('email_inscription.html.twig', ['name' => $inscriptionType->getData()->pseudo, 'token' => '123456789' ]))
                ->setContentType("text/html");
            $mailer->send($message);
            return true;
        }
        return false;
    }
}

