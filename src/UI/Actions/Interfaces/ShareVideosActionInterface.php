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

use App\Domain\Form\FormHandler\Interfaces\VideosTypeHandlerInterface;
use App\Domain\Repository\Interfaces\VideosRepositoryInterface;
use App\UI\Responders\Interfaces\AddVideoResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interface ShareVideosActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface ShareVideosActionInterface
{
    /**
     * ShareVideosActionInterface constructor
     *
     * @param VideosRepositoryInterface  $videosRepository
     * @param FormFactoryInterface       $formFactory
     */
    public function __construct(
        VideosRepositoryInterface $videosRepository,
        FormFactoryInterface $formFactory
    );

    /**
     * @param Request                       $request
     * @param VideosTypeHandlerInterface    $mediaHandler
     * @param UrlGeneratorInterface         $urlGenerator
     * @param AddVideoResponderInterface    $addVideoResponder
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        VideosTypeHandlerInterface $mediaHandler,
        UrlGeneratorInterface $urlGenerator,
        AddVideoResponderInterface $addVideoResponder
    );
}
