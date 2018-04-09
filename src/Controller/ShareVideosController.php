<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Controller;

use App\DTO\Interfaces\VideosDTOInterface;
use App\Form\FormHandler\VideosTypeHandlerInterface;
use App\Form\Type\VideosType;
use App\Repository\Interfaces\MediasRepositoryInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AddMediasController.
 *
 * @Route("/ajout-videos/{id}", name="add_videos")
 */
class ShareVideosController
{
    /**
     * @var MediasRepositoryInterface
     */
    private $mr;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * ShareVideosController constructor.
     *
     * @param MediasRepositoryInterface $mr
     * @param Environment               $twig
     * @param FormFactoryInterface      $formFactory
     */
    public function __construct(
        MediasRepositoryInterface $mr,
        Environment $twig,
        FormFactoryInterface $formFactory
    ) {
        $this->mr = $mr;
        $this->twig = $twig;
        $this->formFactory = $formFactory;
    }

    /**
     * @param int                        $id
     * @param Request                    $request
     * @param VideosDTOInterface         $dto
     * @param VideosTypeHandlerInterface $mediaHandler
     *
     * @return Response
     */
    public function __invoke(
        Request $request,
        VideosDTOInterface $dto,
        VideosTypeHandlerInterface $mediaHandler
    ) {
        $videos = $this->formFactory
            ->create(VideosType::class, $dto)
            ->handleRequest($request);

        if ($mediaHandler->handle($videos, $dto, intval($request->get('id')))) {
            return new Response($this->twig->render('added_medias.html.twig'));
        }

        return new Response($this->twig
            ->render('add_trick.html.twig', ['form' => $videos->createView()]));
    }
}
