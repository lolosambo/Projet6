<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Controller;

use App\DTO\Interfaces\InscriptionUserDTOInterface;
use App\Form\FormHandler\InscriptionTypeHandler;
use App\Form\Type\InscriptionType;
use Swift_Mailer;
use Swift_Message;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

/**
 * Class InscriptionFormController.
 */
class InscriptionFormController
{
    /**
     * @var InscriptionUserDTOInterface
     */
    private $dto;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * InscriptionFormController constructor.
     *
     * @param InscriptionUserDTOInterface $dto
     * @param FormFactoryInterface        $formFactory
     * @param Environment                 $environment
     */
    public function __construct(
        InscriptionUserDTOInterface $dto,
        FormFactoryInterface $formFactory,
        Environment $environment
    ) {
        $this->dto = $dto;
        $this->formFactory = $formFactory;
        $this->twig = $environment;
    }

    /**
     * @Route("/inscription", name="inscription")
     *
     * @param Request                $request
     * @param InscriptionTypeHandler $InscriptionTypeHandler
     * @param \Swift_Mailer          $mailer
     *
     * @return Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(
        Request $request,
        InscriptionTypeHandler $InscriptionTypeHandler,
        Swift_Mailer $mailer
    ) {
        $form = $this->formFactory
            ->create(InscriptionType::class, $this->dto)
            ->handleRequest($request);

        if ($InscriptionTypeHandler->handle($form)) {
            $message = (new Swift_Message('Nouvelle inscription'))
                ->setFrom('lolosambo2@gmail.com')
                ->setTo($this->dto->mail)
                ->setBody($this->twig->render(
                    'email_inscription.html.twig',
                    [
                        'name' => $this->dto->pseudo,
                        'token' => '123456789', ]
                ),
                    'text/html'
                );

            $mailer->send($message);

            return new Response($this->twig->render('inscription_status.html.twig'));
        }

        return  new Response($this->twig->render('inscription.html.twig', [
            'form' => $form->createView(),
        ]));
    }
}
