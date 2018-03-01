<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnectionFormController extends Controller {

    public function showConnectionForm() {
        return $this->render('login.html.twig');
    }

}