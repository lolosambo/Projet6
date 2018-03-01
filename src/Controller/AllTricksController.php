<?php


namespace App\Controller;


use App\Entity\Tricks;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AllTricksController extends Controller {

    public function showAllTricksAction() {

        $em = $this->getDoctrine()->getManager();
        $tricks = $em->getRepository('App\Entity\Tricks')->findBy([], ['trickDate' => 'desc']);

        $medias = $em->getRepository('App\Entity\Medias')->findBy(['aLaUne' => 1]);
        $em->flush();

        return $this->render('home.html.twig', ['tricks' => $tricks, 'media' => $medias]);

    }
}