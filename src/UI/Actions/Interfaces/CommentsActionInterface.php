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

namespace App\UI\Actions\Interfaces;

use App\Domain\DTO\Interfaces\CommentDTOInterface;
use App\Domain\Form\FormHandler\Interfaces\CommentTypeHandlerInterface;
use App\UI\Responders\Interfaces\CommentsResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface CommentsActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface CommentsActionInterface
{
    /**
     * CommentsActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param SessionInterface $session
     * @param CommentDTOInterface $dto
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        SessionInterface $session,
        CommentDTOInterface $dto
    );

    /**
     * @param Request $request
     * @param CommentTypeHandlerInterface $commentTypeHandler
     * @param CommentsResponderInterface $commentsResponder
     * @return mixed
     */
    public function getComments(
        Request $request,
        CommentTypeHandlerInterface $commentTypeHandler,
        CommentsResponderInterface $commentsResponder
    );

}