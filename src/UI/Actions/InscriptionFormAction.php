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

use App\Domain\Form\FormHandler\InscriptionTypeHandler;
use App\Domain\Form\Type\InscriptionType;
use App\Domain\Services\Interfaces\MailerServiceInterface;
use App\UI\Actions\Interfaces\InscriptionFormActionInterface;
use App\UI\Responders\Interfaces\InscriptionFormResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Class InscriptionFormAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class InscriptionFormAction implements InscriptionFormActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * InscriptionFormAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        FormFactoryInterface $formFactory
    ) {
        $this->formFactory = $formFactory;
    }

    /**
     * @Route("/inscription", name="inscription")
     *
     * @param Request $request
     * @param InscriptionTypeHandler $InscriptionTypeHandler
     * @param MailerServiceInterface $mailer
     * @param UrlGeneratorInterface $urlGenerator
     * @param InscriptionFormResponderInterface $inscriptionFormResponder
     *
     * @return mixed|RedirectResponse
     *
     * @throws \Exception
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(
        Request $request,
        InscriptionTypeHandler $handler,
        MailerServiceInterface $mailer,
        UrlGeneratorInterface $urlGenerator,
        InscriptionFormResponderInterface $responder
    ) {
        $form = $this->formFactory
            ->create(InscriptionType::class)
            ->handleRequest($request);

        if ($handler->handle($request, $form, $mailer, $urlGenerator)) {
            $request->getSession()->getFlashBag()->add(
                'notice', "Votre inscription a bien été prise en compte.\r\n
                Veuillez vérifier votre messagerie afin d'activer votre compte !"
            );
            return new RedirectResponse($urlGenerator->generate('homepage'));
        }
        return  $responder(['form' => $form->createView()]);
    }
}


