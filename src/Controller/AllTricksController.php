<?php


namespace App\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AllTricksController {


    /**
     * @Route("/", name="homepage")
     *
     */
    public function __invoke(Request $request, Environment $environment, EntityManagerInterface $em) {

        $tricks = $em->getRepository('App\Entity\Tricks')->findBy([], ['trickDate' => 'desc']);
        $medias = $em->getRepository('App\Entity\Medias')->findBy(['aLaUne' => 1]);
        $em->flush();
        return new Response($environment->render('home.html.twig', ['tricks' => $tricks, 'medias' => $medias]));

    }

}