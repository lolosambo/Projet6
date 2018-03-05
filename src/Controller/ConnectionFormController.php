<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnectionFormController extends Controller {

    /**
     * @Route("/connexion", name="connection")
     */
    public function showConnectionFormAction() {


        return $this->render('login.html.twig');
    }

}