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

use App\Domain\Form\FormHandler\Interfaces\VideosTypeHandlerInterface;
use App\Domain\Form\Type\VideosType;
use App\Domain\Repository\Interfaces\VideosRepositoryInterface;
use App\UI\Responders\Interfaces\AddVideoResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class AddMediasController.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 *
 * @Route("/ajout-videos/{slug}", name="add_videos")
 */
class ShareVideosAction
{
    /**
     * @var VideosRepositoryInterface
     */
    private $videosRepository;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * ShareVideosAction constructor.
     *
     * @param VideosRepositoryInterface $videosRepository
     * @param FormFactoryInterface      $formFactory
     */
    public function __construct(
        VideosRepositoryInterface $videosRepository,
        FormFactoryInterface $formFactory
    ) {
        $this->videosRepository = $videosRepository;
        $this->formFactory = $formFactory;
    }

    /**
     * @param Request $request
     * @param VideosTypeHandlerInterface $mediaHandler
     * @param UrlGeneratorInterface $urlGenerator
     * @param AddVideoResponderInterface $addVideoResponder
     * @return mixed
     */
    public function __invoke(
        Request $request,
        VideosTypeHandlerInterface $mediaHandler,
        UrlGeneratorInterface $urlGenerator,
        AddVideoResponderInterface $addVideoResponder
    ) {
        $videos = $this->formFactory
            ->create(VideosType::class)
            ->handleRequest($request);

        if ($mediaHandler->handle($videos, $request->get('slug'))) {
            $request->getSession()->getFlashBag()->add(
                'notice', 'La(es) vidéo(s) a(ont) bien été ajoutée(s) !'
            );
            return new RedirectResponse($urlGenerator->generate('single_trick', ['slug' => $request->get('slug')]));
        }

        return $addVideoResponder(['form' => $videos->createView()]);
    }
}
