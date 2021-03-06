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
use App\Domain\Form\FormHandler\Interfaces\CommentTypeHandlerInterface;
use App\Domain\Form\Type\CommentType;
use App\UI\Actions\Interfaces\CommentsActionInterface;
use App\UI\Responders\Interfaces\CommentsResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class CommentsAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class CommentsAction implements CommentsActionInterface
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * CommentsAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param SessionInterface     $session
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        SessionInterface $session
    ) {
        $this->formFactory = $formFactory;
        $this->session = $session;
    }

    /**
     * @param Request $request
     * @param CommentTypeHandlerInterface $commentTypeHandler
     * @param CommentsResponderInterface $commentsResponder
     *
     * @return \Exception|mixed|void
     */
    public function getComments(Request $request, CommentTypeHandlerInterface $commentTypeHandler, CommentsResponderInterface $commentsResponder)
    {
        if (null !== $this->session->get('userId')) {
            $addCommentForm = $this->formFactory->create(CommentType::class);
            if ($commentTypeHandler->handle($request, $addCommentForm)) {
                return $commentsResponder($request, ['addCommentForm' => $addCommentForm->createView()]);
            }
            return new \Exception('Le commentaire n\'a pas pu être publié');
        }
        return;
    }
}

