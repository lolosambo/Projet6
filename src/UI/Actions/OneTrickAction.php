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

use App\Domain\Form\FormHandler\Interfaces\CommentTypeHandlerInterface;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\Domain\Form\Type\CommentType;
use App\UI\Actions\Interfaces\OneTrickActionInterface;
use App\UI\Responders\Interfaces\OneTrickResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


/**
 * Class OneTrickAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class OneTrickAction implements OneTrickActionInterface
{
    /**
     * @var TricksRepositoryInterface
     */
    private $tricksRepository;

    /**
     * @var ImagesRepositoryInterface
     */
    private $imagesRepository;

    /**
     * @var
     */
    private $formFactory;

    /**
     * OneTrickAction constructor.
     *
     * @param TricksRepositoryInterface   $tricksRepository
     * @param ImagesRepositoryInterface   $imagesRepository
     * @param FormFactoryInterface        $formFactory
     */
    public function __construct(
        TricksRepositoryInterface $tricksRepository,
        ImagesRepositoryInterface $imagesRepository,
        FormFactoryInterface $formFactory
    ) {
        $this->tricksRepository = $tricksRepository;
        $this->imagesRepository = $imagesRepository;
        $this->formFactory = $formFactory;
    }

    /**
     * @Route("/trick/{slug}", name="single_trick")
     *
     * @param Request $request
     * @param SessionInterface $session
     * @param CommentTypeHandlerInterface $commentTypeHandler
     * @param OneTrickResponderInterface $oneTrickResponder
     *
     * @return mixed|RedirectResponse
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function __invoke(
        Request $request,
        TokenStorageInterface $tokenStorage,
        CommentTypeHandlerInterface $commentTypeHandler,
        OneTrickResponderInterface $oneTrickResponder,
        UrlGeneratorInterface $generator
    ) {
        $title = $request->attributes->get('slug');
        $trick = $this->tricksRepository->findTrickDetails($title);
        if ($tokenStorage->getToken()->getUser()) {
            $addCommentForm = $this->formFactory->create(CommentType::class)
                                                ->handleRequest($request);
            if ($commentTypeHandler->handle($request, $addCommentForm)) {
                return new RedirectResponse($generator->generate('single_trick', ['slug' => $title]));
            }
            return $oneTrickResponder($request, [
                'trick' => $trick,
                'addCommentForm' => $addCommentForm->createView(),
                'aLaUne' => $this->imagesRepository->findImageALaUne($trick->getSlug()),
                ]
            );
        }
        return $oneTrickResponder($request, [
                'trick' => $trick,
                'aLaUne' => $this->imagesRepository->findImageALaUne($trick->getSlug()),
            ]
        );
    }
}


