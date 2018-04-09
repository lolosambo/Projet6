<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Controller;

use App\DTO\Interfaces\ALaUneDTOInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\FormHandler\ALaUneTypeHandlerInterface;
use App\Form\Type\ALaUneType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ALaUneController.
 */
class ALaUneController
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * ALaUneController constructor.
     *
     * @param Environment          $twig
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        Environment $twig,
        FormFactoryInterface $formFactory
    ) {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
    }

    /**
     * @Route("/image_a_la_une/{id}", name = "frontPage_image")
     *
     * @param Request                    $request
     * @param ALaUneTypeHandlerInterface $aLaUneTypeHandler
     * @param ALaUneDTOInterface         $dto
     *
     * @return RedirectResponse|Response
     */
    public function __invoke(
        Request $request,
        ALaUneTypeHandlerInterface $aLaUneTypeHandler,
        ALaUneDTOInterface $dto
    ) {
        $id = intval($request->get('id'));
        $form = $this->formFactory
            ->create(ALaUneType::class, $dto, ['trickId' => $id])
            ->handleRequest($request);

        if ($aLaUneTypeHandler->handle($form, $dto, $id)) {
            return new RedirectResponse('/trick/'.$id);
        }

        return new Response($this->twig
            ->render('aLaUne.html.twig', ['form' => $form->createView()]));
    }
}
