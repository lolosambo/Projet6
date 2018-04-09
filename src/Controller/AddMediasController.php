<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Controller;

use App\DTO\Interfaces\MediasDTOInterface;
use App\Form\FormHandler\MediasTypeHandlerInterface;
use App\Form\Type\MediasType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AddMediasController.
 *
 * @Route("/ajout-medias/{id}", name="add_medias")
 */
class AddMediasController
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * AddMediasController constructor.
     *
     * @param Environment          $twig
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        Environment $twig,
        FormFactoryInterface $formFactory
    ) {
        $this->twig = $twig;
        $this->formFactory = $formFactory;
    }

    /**
     * @param $id
     * @param Request                    $request
     * @param MediasDTOInterface         $mediaDto
     * @param MediasTypeHandlerInterface $mediaHandler
     */
    public function __invoke(
        int $id,
        Request $request,
        MediasDTOInterface $mediaDto,
        MediasTypeHandlerInterface $mediaHandler
    ) {
        $medias = $this->formFactory
            ->create(MediasType::class, $mediaDto)
            ->handleRequest($request);

        if ($mediaHandler->handle($medias, $mediaDto, $id)) {
            return new Response($this->twig->render('added_medias.html.twig'));
        }

        return new Response($this->twig
            ->render('add_trick.html.twig', ['form' => $medias->createView()]));
    }
}
