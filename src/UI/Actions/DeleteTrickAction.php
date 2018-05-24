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
    private $tr;

    /**
     * DeleteTrickAction constructor.
     *
     * @param TricksRepositoryInterface $tr
     */
    public function __construct(TricksRepositoryInterface $tr)
    {
        $this->tr = $tr;
    }

    /**
     * @Route("/supprimer/{id}", name="delete_trick")
     */
    public function __invoke(Request $request)
    {
        $this->tr->deleteTrick($request->get('id'));
        $this->tr->flush();

        return new RedirectResponse('/');
    }
}
