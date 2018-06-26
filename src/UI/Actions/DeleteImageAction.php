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

use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use App\UI\Actions\Interfaces\DeleteImageActionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class DeleteImageAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class DeleteImageAction implements DeleteImageActionInterface
{
    /**
     * @var ImagesRepositoryInterface
     */
    private $imagesRepository;

    /**
     * DeleteImageAction constructor.
     *
     * @param ImagesRepositoryInterface $mr
     */
    public function __construct(ImagesRepositoryInterface $imagesRepository)
    {
        $this->imagesRepository = $imagesRepository;
    }

    /**
     * @Route("/supprimer/trick/{slug}/images/{mediaId}", name="delete_images")
     */
    public function __invoke(Request $request, UrlGeneratorInterface $generator)
    {
        $this->imagesRepository->deleteImage($request->attributes->get('mediaId'));
        $this->imagesRepository->flush();
        $request->getSession()->getFlashBag()->add(
            'notice', 'L\'image a bien été supprimée !'
        );

        return new RedirectResponse($generator->generate('single_trick', [
            'slug' => $request->attributes->get('slug')
        ])
        );
    }
}

