<?php
declare(strict_types=1);
/*
 * This file is part of the SnowTricks project.
 *
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace App\UI\Actions;
use App\UI\Actions\Interfaces\ConnectionFormActionInterface;
use App\UI\Responders\ConnectionFormResponder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
/**
 * Class ConnectionFormAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ConnectionFormAction implements ConnectionFormActionInterface
{
    /**
     * @Route("/connexion", name="login")
     *
     */
    public function __invoke(
        Request $request,
        AuthenticationUtils $authenticationUtils,
        ConnectionFormResponder $connectionFormResponder
    ) {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $connectionFormResponder(['error' => $error]);
    }
}