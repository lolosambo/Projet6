<?php

declare(strict_types=1);



namespace App\Controller;

use App\Repository\TricksRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class AllTricksController.
 * @Author Laurent BERTON <lolosambo2@gmail.com>
 */
class AllTricksController
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var TricksRepository
     */
    private $tr;

    /**
     * AllTricksController constructor.
     *
     * @param Environment      $environment
     * @param TricksRepository $tr
     */
    public function __construct(Environment $environment, TricksRepository $tr)
    {
        $this->twig = $environment;
        $this->tr = $tr;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function __invoke()
    {
        $tricks = $this->tr->findAllTricksWithMediasByDate();
        $this->tr->flush();

        return new Response($this->twig->render('home.html.twig', ['tricks' => $tricks]));
    }
}
