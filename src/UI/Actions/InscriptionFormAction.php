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

use App\Domain\DTO\Interfaces\InscriptionUserDTOInterface;
use App\Domain\Form\FormHandler\InscriptionTypeHandler;
use App\Domain\Form\Type\InscriptionType;
use App\UI\Actions\Interfaces\InscriptionFormActionInterface;
use App\UI\Responders\Interfaces\InscriptionFormResponderInterface;
use App\UI\Responders\Interfaces\InscriptionStatusResponderInterface;
use Swift_Mailer;
use Swift_Message;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

/**
 * Class InscriptionFormAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class InscriptionFormAction implements InscriptionFormActionInterface
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
     * InscriptionFormAction constructor.
     *
     * @param InscriptionUserDTOInterface $dto
     * @param FormFactoryInterface        $formFactory
     */
    public function __construct(
        InscriptionUserDTOInterface $dto,
        FormFactoryInterface $formFactory,
        Environment $twig
    ) {
        $this->dto = $dto;
        $this->formFactory = $formFactory;
        $this->twig = $twig;
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
        Swift_Mailer $mailer,
        InscriptionStatusResponderInterface $inscriptionStatusResponder,
        InscriptionFormResponderInterface $inscriptionFormResponder
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

            return $inscriptionStatusResponder();
        }

        return  $inscriptionFormResponder(['form' => $form->createView()]);
    }
}
