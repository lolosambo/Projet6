<?php


namespace App\Controller;


use App\Entity\Tricks;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OneTrickController extends Controller {

    public function showTrickAction($id) {

        $em = $this->getDoctrine()->getManager();
        $trick = $em->getRepository('App\Entity\Tricks')->find($id);

        $medias = $em->getRepository('App\Entity\Medias')->findBy(['idTrick' =>$id]);
        $em->flush();

        return $this->render('oneTrick.html.twig', ['trick' => $trick, 'medias' => $medias]);

    }
}