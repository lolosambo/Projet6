<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AllTricksController extends Controller
{

    /**
     * @Route("/", name="home")
     */
    public function showAllTricksAction() {

        return new Response('coucou');

    }

}