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

use App\Domain\DTO\Interfaces\CommentDTOInterface;
use App\Domain\Form\FormHandler\CommentTypeHandler;

use App\Domain\Repository\Interfaces\CommentsRepositoryInterface;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use App\Domain\Repository\Interfaces\VideosRepositoryInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\Domain\Form\Type\CommentType;
use App\UI\Actions\Interfaces\OneTrickActionInterface;
use App\UI\Responders\Interfaces\OneTrickResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class OneTrickAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class OneTrickAction implements OneTrickActionInterface
{
    /**
     * @var TricksRepositoryInterface
     */
    private $tr;

    /**
     * @var ImagesRepositoryInterface
     */
    private $ir;

    /**
     * @var VideosRepositoryInterface
     */
    private $vr;

    /**
     * @var CommentsRepositoryInterface
     */
    private $cr;

    /**
     * @var CommentDTOInterface
     */
    private $dto;


    /**
     * @var
     */
    private $formFactory;

    /**
     * OneTrickAction constructor.
     *
     * @param TricksRepositoryInterface   $tr
     * @param CommentsRepositoryInterface $cr
     * @param ImagesRepositoryInterface   $ir
     * @param VideosRepositoryInterface $mr
     * @param FormFactoryInterface        $formFactory
     * @param CommentDTOInterface         $dto
     */
    public function __construct(
        TricksRepositoryInterface $tr,
        CommentsRepositoryInterface $cr,
        ImagesRepositoryInterface $ir,
        VideosRepositoryInterface $vr,
        FormFactoryInterface $formFactory,
        CommentDTOInterface $dto
    ) {
        $this->tr = $tr;
        $this->ir = $ir;
        $this->vr = $vr;
        $this->cr = $cr;
        $this->formFactory = $formFactory;
        $this->dto = $dto;
    }

    /**
     * @Route("/trick/{id}", name="single_trick")
     *
     * @param Request $request
     * @param SessionInterface $session
     * @param CommentTypeHandler $commentTypeHandler
     * @param OneTrickResponderInterface $oneTrickResponder
     *
     * @return mixed|RedirectResponse
     */
    public function __invoke(
        Request $request,
        SessionInterface $session,
        CommentTypeHandler $commentTypeHandler,
        OneTrickResponderInterface $oneTrickResponder
    ) {
        $id = intval($request->get('id'));
        $trick = $this->tr->findTrick($id);
        $comments = $this->cr->findByTrickId($id);
        $aLaUne = $this->ir->findImageALaUne($id);
        $images = $this->ir->findByTrick($id);
        $videos = $this->vr->findByTrick($id);
        $userId = $session->get('userId');

        if ($userId) {
            $addCommentForm = $this->formFactory->create(CommentType::class, $this->dto)
                                                ->handleRequest($request);

            if ($commentTypeHandler->handle($request, $addCommentForm, $userId, $id)) {
                return new RedirectResponse('/trick/'.$id); // urlGenerator
            }

            return $oneTrickResponder([
                'trick' => $trick,
                'images' => $images,
                'videos' => $videos,
                'comments' => $comments,
                'addCommentForm' => $addCommentForm->createView(),
                'aLaUne' => $aLaUne,
                ]
            );
        }

        return $oneTrickResponder([
                'trick' => $trick,
                'images' => $images,
                'videos' => $videos,
                'comments' => $comments,
                'aLaUne' => $aLaUne,
            ]
        );
    }
}

