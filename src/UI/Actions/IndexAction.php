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

use App\UI\Actions\Interfaces\IndexActionInterface;
use App\Domain\Repository\TricksRepository;
use App\UI\Responders\Interfaces\IndexResponderInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class AllTricksController.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class IndexAction implements IndexActionInterface
{

    /**
     * @var TricksRepository
     */
    private $tr;

    /**
     * AllTricksController constructor.
     *
     * @param TricksRepository $tr
     */
    public function __construct(TricksRepository $tr)
    {
        $this->tr = $tr;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function __invoke(IndexResponderInterface $indexResponder)
    {
        return $indexResponder(['tricks' => $this->tr->findAllTricksWithMediasByDate()]);
    }
}

