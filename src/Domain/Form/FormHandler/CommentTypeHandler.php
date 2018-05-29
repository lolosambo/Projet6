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
     * @var SessionInterface
     */
    private $session;

    /**
     * CommentTypeHandler constructor.
     *
     * @param UsersRepositoryInterface    $ur
     * @param CommentsRepositoryInterface $cr
     * @param TricksRepositoryInterface   $tr
     * @param SessionInterface            $session
     */
    public function __construct(
        UsersRepositoryInterface $ur,
        CommentsRepositoryInterface $cr,
        TricksRepositoryInterface $tr,
        SessionInterface $session)
    {
        $this->ur = $ur;
        $this->cr = $cr;
        $this->tr = $tr;
        $this->session = $session;
    }

    /**
     * @param FormInterface $commentType
     *
     * @return bool
     */
    public function handle(Request $request, FormInterface $commentType)
    {
        if ($commentType->isSubmitted() && $commentType->isValid()) {
            $userId = $this->session->get('userId');
            $trickId = $request->get('id');
            $user = $this->ur->find($userId);
            $trick = $this->tr->find($trickId);
            $comment = new Comments($commentType->getData()->content);
            $comment->setUserId($userId);
            $comment->setTrickId($trickId);
            $comment->setCommentDate(new \Datetime('NOW'));
            $comment->setCommentUpdate(new \Datetime('NOW'));
            $comment->setUser($user);
            $comment->setTrick($trick);
            $this->cr->save($comment);
            return true;
        }
        return false;
    }
}


