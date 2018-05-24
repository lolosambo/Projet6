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

use App\Domain\DTO\Interfaces\VideosDTOInterface;
use App\Domain\Form\FormHandler\Interfaces\VideosTypeHandlerInterface;
use App\Domain\Repository\Interfaces\VideosRepositoryInterface;
use App\UI\Responders\Interfaces\AddedVideoResponderInterface;
use App\UI\Responders\Interfaces\AddVideoResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

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
     * @param VideosRepositoryInterface $vr
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        VideosRepositoryInterface $vr,
        FormFactoryInterface $formFactory
    );

    /**
     * @param Request $request
     * @param VideosDTOInterface $dto
     * @param VideosTypeHandlerInterface $mediaHandler
     * @param AddedVideoResponderInterface $addedVideoResponder
     * @param AddVideoResponderInterface $addVideoResponder
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        VideosDTOInterface $dto,
        VideosTypeHandlerInterface $mediaHandler,
        AddedVideoResponderInterface $addedVideoResponder,
        AddVideoResponderInterface $addVideoResponder
    );
}
