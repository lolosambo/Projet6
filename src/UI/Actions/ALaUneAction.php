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
use App\UI\Actions\Interfaces\ALaUneActionInterface;
use App\UI\Responders\Interfaces\ALaUneResponderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class ALaUneAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ALaUneAction implements ALaUneActionInterface
{
    /**
     * @var ImagesRepositoryInterface
     */
    private $imagesRepository;

    /**
     * ALaUneAction constructor.
     *
     * @param ImagesRepositoryInterface $imagesRepository
     */
    public function __construct(ImagesRepositoryInterface $imagesRepository)
    {
        $this->imagesRepository = $imagesRepository;
    }

    /**
     * @Route("/trick/{trick_id}/image_a_la_une/{id}", name = "frontPage_image")
     *
     * @param Request $request
     */
    public function __invoke(
        Request $request,
        UrlGeneratorInterface $urlGenerator
    ) {
        $trick_id = $request->get('trick_id');
        $id = $request->get('id');
        $image = $this->imagesRepository->findImageALaUne($trick_id);
        if ($image) {
            $image->setALaUne(0);
        }
        $aLaUne = $this->imagesRepository->findById($id);
        $aLaUne->setALaUne(1);
        $this->imagesRepository->flush();

        return new RedirectResponse($urlGenerator->generate(
            'single_trick',
            ['id' => $trick_id]));
    }
}

