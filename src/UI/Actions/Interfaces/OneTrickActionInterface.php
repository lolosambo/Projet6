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
use App\Domain\Form\FormHandler\CommentTypeHandler;
use App\Domain\Repository\Interfaces\CommentsRepositoryInterface;
use App\Domain\Repository\Interfaces\VideosRepositoryInterface;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Responders\Interfaces\OneTrickResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interface OneTrickActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface OneTrickActionInterface
{
    /**
     * OneTrickActionInterface constructor.
     *
     * @param TricksRepositoryInterface    $tr
     * @param CommentsRepositoryInterface  $cr
     * @param ImagesRepositoryInterface    $mr
     * @param VideosRepositoryInterface    $mr
     * @param FormFactoryInterface         $formFactory
     */
    public function __construct(
        TricksRepositoryInterface $tr,
        CommentsRepositoryInterface $cr,
        ImagesRepositoryInterface $ir,
        VideosRepositoryInterface $vr,
        FormFactoryInterface $formFactory
    );

    /**
     * @param Request                    $request
     * @param SessionInterface           $session
     * @param CommentTypeHandler         $commentTypeHandler
     * @param OneTrickResponderInterface $oneTrickResponder
     * @return mixed
     */
    public function __invoke(
        Request $request,
        SessionInterface $session,
        CommentTypeHandler $commentTypeHandler,
        OneTrickResponderInterface $oneTrickResponder,
        UrlGeneratorInterface $generator
    );
}
