<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

/**
 * Class ConnectionFormController.
 */
class ConnectionFormController
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ConnectionFormController constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route("/connexion", name="login")
     * @Method({"GET","POST"})
     */
    public function __invoke(
        Request $request,
        AuthenticationUtils $authenticationUtils
    ) {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return new Response($this->twig->render('login.html.twig', ['error' => $error]));
    }
}
