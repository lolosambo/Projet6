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
use App\UI\Actions\Interfaces\IndexActionInterface;
use App\UI\Responders\Interfaces\IndexResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AllTricksController.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class IndexAction implements IndexActionInterface
{
    /**
     * @var TricksRepositoryInterface
     */
    private $tricksRepository;

    public function __construct(TricksRepositoryInterface $tricksRepository)
    {
        $this->tricksRepository = $tricksRepository;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function __invoke(
        Request $request,
        IndexResponderInterface $indexResponder
    )
    {
        $tricks = $this->tricksRepository->findAllTricksWithMediasByDate();
        return $indexResponder($request, ['tricks' => $tricks]);
    }
}

