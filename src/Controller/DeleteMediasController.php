<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Controller;

use App\Repository\Interfaces\MediasRepositoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DeleteMediasController.
 */
class DeleteMediasController
{
    /**
     * @var MediasRepositoryInterface
     */
    private $mr;

    /**
     * DeleteMediasController constructor.
     *
     * @param MediasRepositoryInterface $mr
     */
    public function __construct(MediasRepositoryInterface $mr)
    {
        $this->mr = $mr;
    }

    /**
     * @Route("/supprimer/trick/{trickId}/medias/{mediaId}", name="delete_medias")
     */
    public function __invoke(Request $request)
    {
        $this->mr->deleteMedia($request->get('mediaId'));
        $this->mr->flush();

        return new RedirectResponse('/trick/'.$request->get('trickId'));
    }
}
