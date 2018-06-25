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

use App\Domain\Form\FormHandler\Interfaces\ForgotPasswordTypeHandlerInterface;
use App\UI\Responders\Interfaces\ForgotPasswordResponderInterface;
use Swift_Mailer;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * interface ChangePasswordActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface ForgotPasswordActionInterface
{
    /**
     * ChangePasswordActionInterface constructor.
     */
    public function __construct(FormFactoryInterface $factory);

    /**
     * @Route("/change-password", name = "change_password")
     *
     * @param Request                                 $request
     * @param ForgotPasswordTypeHandlerInterface    $handler
     * @param Swift_Mailer                            $mailer
     * @param UrlGeneratorInterface                   $urlGenerator
     * @param ForgotPasswordResponderInterface  $responder
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        ForgotPasswordTypeHandlerInterface $handler,
        Swift_Mailer $mailer,
        UrlGeneratorInterface $urlGenerator,
        ForgotPasswordResponderInterface $responder
    );
}
