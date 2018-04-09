<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Controller;

use App\Repository\Interfaces\TricksRepositoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DeleteTrickController.
 */
class DeleteTrickController
{
    /**
     * @var TricksRepositoryInterface
     */
    private $tr;

    /**
     * DeleteTrickController constructor.
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
