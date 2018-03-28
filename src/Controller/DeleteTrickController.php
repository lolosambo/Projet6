<?php


namespace App\Controller;

use App\Entity\Tricks;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteTrickController
{
    private $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * @Route("/supprimer/{id}", name="delete_trick")
     */
    public function __invoke(int $id, Request $request) {


        $trick = $this->em->getRepository('App\Entity\Tricks')->find($id);
        dump($trick);
        $this->em->remove($trick);
        $this->em->flush();
        return new RedirectResponse('/');

    }

}