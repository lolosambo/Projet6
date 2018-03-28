<?php

namespace App\Form\FormHandler;


use App\DTO\CommentDTO;
use App\Entity\Comments;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use App\Form\FormHandler\CommentTypeHandlerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class CommentTypeHandler implements CommentTypeHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var CommentDTO
     */
    private $dto;

    /**
     * @var SessionInterface
     */
    private $session;


    /**
     * CommentTypeHandler constructor.
     * @param EntityManagerInterface $em
     * @param CommentDTO $dto
     */
    public function __construct(EntityManagerInterface $em, CommentDTO $dto, SessionInterface $session)
    {
        $this->em = $em;
        $this->dto = $dto;
        $this->session = $session;
    }

    /**
     * @param FormInterface $commentType
     * @return bool
     */
    public function handle(FormInterface $commentType, $userId, $trickId)
    {
        if ($commentType->isSubmitted() && $commentType->isValid()) {
            $user = $this->em->getRepository('App\Entity\Users')->find($userId);
            $trick = $this->em->getRepository('App\Entity\Tricks')->find($trickId);
            $comment = new Comments($this->dto->content);
            $comment->setUserId($userId);
            $comment->setTrickId($trickId);
            $comment->setCommentDate(new \Datetime('NOW'));
            $comment->setCommentUpdate(new \Datetime('NOW'));
            $comment->setUser($user);
            $comment->setTrick($trick);

            $this->em->persist($comment);
            $this->em->flush();

            return true;
        }

        return false;

    }
}
