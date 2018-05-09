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
    private $vr;

    /**
     * DeleteImageAction constructor.
     *
     * @param VideosRepositoryInterface $mr
     */
    public function __construct(VideosRepositoryInterface $vr)
    {
        $this->vr = $vr;
    }

    /**
     * @Route("/supprimer/trick/{trickId}/videos/{mediaId}", name="delete_videos")
     */
    public function __invoke(Request $request)
    {
        $this->vr->deleteVideo(intval($request->get('mediaId')));
        $this->vr->flush();

        return new RedirectResponse('/trick/'.$request->get('trickId'));
    }
}