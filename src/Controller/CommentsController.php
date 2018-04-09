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
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Twig\Environment;

/**
 * Class CommentsController.
 */
class CommentsController
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var CommentDTO
     */
    private $dto;

    /**
     * CommentsController constructor.
     *
     * @param Environment          $twig
     * @param FormFactoryInterface $formFactory
     * @param SessionInterface     $session
     * @param CommentDTOInterface  $dto
     */
    public function __construct(
        Environment $twig,
        FormFactoryInterface $formFactory,
        SessionInterface $session,
        CommentDTOInterface $dto
    ) {
        $this->twig = $twig;
        $this->formFactory = $formFactory;
        $this->session = $session;
        $this->dto = $dto;
    }

    public function getComments(CommentTypeHandler $commentTypeHandler)
    {
        if (null !== $this->session->get('userId')) {
            $addCommentForm = $this->formFactory->create(CommentType::class, $this->dto);
            if ($commentTypeHandler->handle($addCommentForm)) {
                return new Response($this->twig
                    ->render('comments.html.twig',
                        [
                            'comments' => $comments,
                            'addCommentForm' => $addCommentForm,
                        ]
                    )
                );
            }

            return new \Exception('Le commentaire n\'a pas pu être publié');
        }

        return;
    }
}
