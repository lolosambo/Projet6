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

use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Actions\Interfaces\DeleteTrickActionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class DeleteTrickAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class DeleteTrickAction implements DeleteTrickActionInterface
{
    /**
     * @var TricksRepositoryInterface
     */
    private $trickRepository;

    /**
     * DeleteTrickAction constructor.
     *
     * @param TricksRepositoryInterface $trickRepository
     */
    public function __construct(TricksRepositoryInterface $trickRepository)
    {
        $this->trickRepository = $trickRepository;
    }

    /**
     * @Route("/supprimer/{slug}", name="delete_trick")
     */
    public function __invoke(Request $request, UrlGeneratorInterface $generator)
    {
        $this->trickRepository->deleteTrick($request->get('slug'));
        $this->trickRepository->flush();
        $request->getSession()->getFlashBag()->add(
            'notice', 'La figure a bien été supprimée !'
        );
        return new RedirectResponse($generator->generate('homepage'));
    }
}

