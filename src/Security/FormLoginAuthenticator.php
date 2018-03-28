<?php
namespace App\Security;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Core\Security;

class FormLoginAuthenticator extends AbstractGuardAuthenticator
{
    private $router;
    private $pseudo;
    private $password;
    private $session;
    private $user;

    public function __construct(SessionInterface $session, RouterInterface $router)
    {
        $this->router = $router;
        $this->session = $session;
    }


    public function supports(Request $request)
    {
        $this->pseudo = $request->request->get('pseudo');
        $this->password = $request->request->get('password');
        if (($this->pseudo === null) && ($this->password === null)) {
            return false;
        } else {
            return true;
        }
    }

    public function getCredentials(Request $request)
    {
        if (!$request->getUri('/connexion')  && !$request->isMethod('POST')) {
            return;
        }

        return [
            'pseudo' => $this->pseudo,
            'password' => $this->password,
        ];
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $pseudo = $credentials['pseudo'];
        $this->user = $userProvider->loadUserByUsername($pseudo);
        return $this->user;
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        if ((sha1($this->password) == $user->getPassword()) && ($this->pseudo == $user->getPseudo())) {
            return true;
        }
        throw new BadCredentialsException();
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        $this->session->set('pseudo', $this->pseudo);
        $this->session->set('userId', $this->user->getId());
        $this->session->set('avatar', $this->user->getAvatar());
        return new RedirectResponse('/');
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);
        return new RedirectResponse('/connexion');
    }
    

    public function supportsRememberMe()
    {
        return false;
    }


    public function start(Request $request, AuthenticationException $authException = null)
    {
        $url = $this->router->generate('login');
        return new RedirectResponse($url);
    }



}