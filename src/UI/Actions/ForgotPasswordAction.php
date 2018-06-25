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

use App\Domain\Form\FormHandler\Interfaces\ForgotPasswordTypeHandlerInterface;
use App\Domain\Form\Type\ForgotPasswordType;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use App\UI\Actions\Interfaces\ForgotPasswordActionInterface;
use App\UI\Responders\Interfaces\ForgotPasswordResponderInterface;
use Swift_Mailer;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * class ForgotPasswordAction
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ForgotPasswordAction implements ForgotPasswordActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $factory;

    public function __construct(FormFactoryInterface $factory)
    {
       $this->factory = $factory;
    }

    /**
     * @Route("/forgot-password", name = "forgot_password")
     *
     * @param Request $request
     * @param ForgotPasswordTypeHandlerInterface $handler
     * @param Swift_Mailer $mailer
     * @param UrlGeneratorInterface $urlGenerator
     *
     * @return mixed|Response
     */
    public function __invoke(
        Request $request,
        ForgotPasswordTypeHandlerInterface $handler,
        Swift_Mailer $mailer,
        UrlGeneratorInterface $urlGenerator,
        ForgotPasswordResponderInterface $responder
    ) {
     $form = $this->factory->create(ForgotPasswordType::class)
                           ->handleRequest($request);
     if($handler->handle($form, $mailer)) {
         $request->getSession()->getFlashBag()->add(
             'notice', "Véfiriez votre boîte mail pour réinitialiser votre mot de passe."
         );
         return new RedirectResponse($urlGenerator->generate('homepage'));
     }
     return $responder(['form' => $form->createView()]);
    }
}

