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

use App\Domain\Form\FormHandler\CommentTypeHandler;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Responders\Interfaces\OneTrickResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


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
     * @param TricksRepositoryInterface    $tricksRepository
     * @param ImagesRepositoryInterface    $imagesRepository
     * @param FormFactoryInterface         $formFactory
     */
    public function __construct(
        TricksRepositoryInterface $tricksRepository,
        ImagesRepositoryInterface $imagesRepository,
        FormFactoryInterface $formFactory
    );

    /**
     * @param Request $request
     * @param TokenStorageInterface $tokenStorage
     * @param CommentTypeHandler $commentTypeHandler
     * @param OneTrickResponderInterface $oneTrickResponder
     * @param UrlGeneratorInterface $generator
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        TokenStorageInterface $tokenStorage,
        CommentTypeHandler $commentTypeHandler,
        OneTrickResponderInterface $oneTrickResponder,
        UrlGeneratorInterface $generator
    );
}
