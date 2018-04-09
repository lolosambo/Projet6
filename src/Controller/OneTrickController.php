<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Controller;

use App\DTO\Interfaces\CommentDTOInterface;
use App\Entity\Comments;
use App\Form\FormHandler\CommentTypeHandler;
use App\Form\Type\CommentType;
use App\Repository\Interfaces\CommentsRepositoryInterface;
use App\Repository\Interfaces\MediasRepositoryInterface;
use App\Repository\Interfaces\TricksRepositoryInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class OneTrickController.
 */
class OneTrickController
{
    /**
     * @var TricksRepositoryInterface
     */
    private $tr;

    /**
     * @var MediasRepositoryInterface
     */
    private $mr;

    /**
     * @var CommentsRepositoryInterface
     */
    private $cr;
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var
     */
    private $formFactory;

    /**
     * OneTrickController constructor.
     *
     * @param Environment                 $twig
     * @param TricksRepositoryInterface   $tr
     * @param CommentsRepositoryInterface $cr
     * @param MediasRepositoryInterface   $mr
     * @param FormFactoryInterface        $formFactory
     * @param CommentDTOInterface         $dto
     */
    public function __construct(
        Environment $twig,
        TricksRepositoryInterface $tr,
        CommentsRepositoryInterface $cr,
        MediasRepositoryInterface $mr,
        FormFactoryInterface $formFactory,
        CommentDTOInterface $dto
    ) {
        $this->tr = $tr;
        $this->mr = $mr;
        $this->cr = $cr;
        $this->twig = $twig;
        $this->formFactory = $formFactory;
        $this->dto = $dto;
    }

    /**
     * @Route("/trick/{id}", name="single_trick")
     *
     * @param int                $id
     * @param SessionInterface   $session
     * @param CommentTypeHandler $commentTypeHandler
     *
     * @return Response
     */
    public function __invoke(
        Request $request,
        SessionInterface $session,
        CommentTypeHandler $commentTypeHandler
    ) {
        $id = $request->get('id');
        $trick = $this->tr->find($id);
        $comments = $this->cr->findByTrickId($id);
        $aLaUne = $this->mr->findMediaALaUne($id);
        $medias = $this->mr->findByTrick($id);

        $userId = $session->get('userId');

        if ($userId) {
            $addCommentForm = $this->formFactory->create(CommentType::class, $this->dto)
                                                ->handleRequest($request);

            if ($commentTypeHandler->handle($addCommentForm, $userId, $id)) {
                return new RedirectResponse('/trick/'.$id); // urlGenerator
            }

            return new Response($this->twig->render('oneTrick.html.twig', [
                'trick' => $trick,
                'medias' => $medias,
                'comments' => $comments,
                'addCommentForm' => $addCommentForm->createView(),
                'aLaUne' => $aLaUne,
                ]
            ));
        }

        return new Response($this->twig->render('oneTrick.html.twig', [
                'trick' => $trick,
                'medias' => $medias,
                'comments' => $comments,
                'aLaUne' => $aLaUne,
            ]
        ));
    }
}
