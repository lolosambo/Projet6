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

use App\Domain\Repository\Interfaces\VideosRepositoryInterface;
use App\UI\Actions\Interfaces\DeleteVideoActionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class DeleteImageAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class DeleteVideoAction implements DeleteVideoActionInterface
{
    /**
     * @var VideosRepositoryInterface
     */
    private $videosRepository;

    /**
     * DeleteImageAction constructor.
     *
     * @param VideosRepositoryInterface $mr
     */
    public function __construct(VideosRepositoryInterface $videosRepository)
    {
        $this->videosRepository = $videosRepository;
    }

    /**
     * @Route("/supprimer/trick/{trickId}/videos/{mediaId}", name="delete_videos")
     */
    public function __invoke(Request $request, UrlGeneratorInterface $generator)
    {
        $this->videosRepository->deleteVideo($request->attributes->get('mediaId'));
        $this->videosRepository->flush();
        $request->getSession()->getFlashBag()->add(
            'notice', 'La vidéo a bien été supprimée !'
        );
        return new RedirectResponse($generator->generate('single_trick', [
            'id' => $request->attributes->get('trickId')
                ])
            );
    }
}
