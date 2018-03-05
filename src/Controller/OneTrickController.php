<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Tricks;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OneTrickController extends Controller {

    /**
     * @Route("/trick/{id}", name="single_trick")
     *
     */
    public function showTrickAction($id) {

        $em = $this->getDoctrine()->getManager();
        $trick = $em->getRepository('App\Entity\Tricks')->find($id);

        $medias = $em->getRepository('App\Entity\Medias')->findBy(['idTrick' =>$id]);
        $em->flush();

        return $this->render('oneTrick.html.twig', ['trick' => $trick, 'medias' => $medias]);

    }
}