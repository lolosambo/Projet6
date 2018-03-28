<?php


namespace App\Controller;

use App\DTO\ConnectUserDTO;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;


class ConnectionFormController {

    /**
     * @var Environment
     */
    private $twig;

    /**
     * ConnectionFormController constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    /**
     * @Route("/connexion", name="login")
     * @Method({"GET","POST"})
     */
    public function __invoke(Request $request, AuthenticationUtils $authenticationUtils) {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return new Response($this->twig->render('login.html.twig', ['error' => $error]));
    }
}
