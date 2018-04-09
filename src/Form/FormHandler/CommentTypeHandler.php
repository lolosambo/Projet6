<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\FormHandler;

use App\DTO\Interfaces\CommentDTOInterface;
use App\Entity\Comments;
use App\Repository\Interfaces\CommentsRepositoryInterface;
use App\Repository\Interfaces\TricksRepositoryInterface;
use App\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class CommentTypeHandler.
 */
class CommentTypeHandler implements CommentTypeHandlerInterface
{
    /**
     * @var TricksRepositoryInterface
     */
    private $tr;

    /**
     * @var UsersRepositoryInterface
     */
    private $ur;

    /**
     * @var CommentsRepositoryInterface
     */
    private $cr;

    /**
     * @var CommentDTOInterface
     */
    private $dto;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * CommentTypeHandler constructor.
     *
     * @param UsersRepositoryInterface    $ur
     * @param CommentsRepositoryInterface $cr
     * @param TricksRepositoryInterface   $tr
     * @param CommentDTOInterface         $dto
     * @param SessionInterface            $session
     */
    public function __construct(
        UsersRepositoryInterface $ur,
        CommentsRepositoryInterface $cr,
        TricksRepositoryInterface $tr,
        CommentDTOInterface $dto,
        SessionInterface $session)
    {
        $this->ur = $ur;
        $this->cr = $cr;
        $this->tr = $tr;
        $this->dto = $dto;
        $this->session = $session;
    }

    /**
     * @param FormInterface $commentType
     *
     * @return bool
     */
    public function handle(FormInterface $commentType, $userId, $trickId)
    {
        if ($commentType->isSubmitted() && $commentType->isValid()) {
            $user = $this->ur->find($userId);
            $trick = $this->tr->find($trickId);
            $comment = new Comments($this->dto->content);
            $comment->setUserId($userId);
            $comment->setTrickId($trickId);
            $comment->setCommentDate(new \Datetime('NOW'));
            $comment->setCommentUpdate(new \Datetime('NOW'));
            $comment->setUser($user);
            $comment->setTrick($trick);
            $this->cr->save($comment);
            $this->cr->flush();

            return true;
        }

        return false;
    }
}
