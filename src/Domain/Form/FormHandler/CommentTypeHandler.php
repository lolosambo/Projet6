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

namespace App\Domain\Form\FormHandler;

use App\Domain\Form\FormHandler\Interfaces\CommentTypeHandlerInterface;
use App\Domain\Models\Comments;
use App\Domain\Repository\Interfaces\CommentsRepositoryInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\Domain\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class CommentTypeHandler.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class CommentTypeHandler implements CommentTypeHandlerInterface
{
    /**
     * @var TricksRepositoryInterface
     */
    private $tricksRepository;

    /**
     * @var CommentsRepositoryInterface
     */
    private $commentsRepository;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * CommentTypeHandler constructor.
     *
     * @param TokenStorageInterface       $tokenStorage
     * @param CommentsRepositoryInterface $commentsRepository
     * @param TricksRepositoryInterface   $tricksRepository
     */
    public function __construct(
        TokenStorageInterface $tokenStorage,
        CommentsRepositoryInterface $commentsRepository,
        TricksRepositoryInterface $tricksRepository
    )
    {
        $this->tokenStorage = $tokenStorage;
        $this->commentsRepository = $commentsRepository;
        $this->tricksRepository = $tricksRepository;
    }

    /**
     * @param Request $request
     * @param FormInterface $commentType
     *
     * @return bool
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function handle(Request $request, FormInterface $commentType)
    {
        if ($commentType->isSubmitted() && $commentType->isValid()) {
            $user = $this->tokenStorage->getToken()->getUser();
            $slug = $request->get('slug');
            $trick = $this->tricksRepository->findTrickDetails($slug);
            $comment = new Comments($commentType->getData()->content);
            $comment->setUserId($user->getId()->toString());
            $comment->setTrickId($trick->getId()->toString());
            $comment->setCommentDate(new \Datetime('NOW'));
            $comment->setCommentUpdate(new \Datetime('NOW'));
            $comment->setUser($user);
            $comment->setTrick($trick);
            $this->commentsRepository->save($comment);
            return true;
        }
        return false;
    }
}


