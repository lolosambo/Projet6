<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

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

/**
 * Class FormLoginAuthenticator.
 */
class FormLoginAuthenticator extends AbstractGuardAuthenticator
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var string
     */
    private $pseudo;

    /**
     * @var string
     */
    private $password;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var
     */
    private $user;

    /**
     * FormLoginAuthenticator constructor.
     *
     * @param SessionInterface $session
     * @param RouterInterface  $router
     */
    public function __construct(SessionInterface $session, RouterInterface $router)
    {
        $this->router = $router;
        $this->session = $session;
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function supports(Request $request)
    {
        $this->pseudo = $request->request->get('pseudo');
        $this->password = $request->request->get('password');
        if ((null === $this->pseudo) && (null === $this->password)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param Request $request
     *
     * @return array|mixed|void
     */
    public function getCredentials(Request $request)
    {
        if ('login' !== $request->attributes->get('_route') && !$request->isMethod('POST')) {
            return;
        }

        return [
            'pseudo' => $this->pseudo,
            'password' => $this->password,
        ];
    }


    /**
     * @param mixed                 $credentials
     * @param UserProviderInterface $userProvider
     *
     * @return null|UserInterface
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $pseudo = $credentials['pseudo'];
        $this->user = $userProvider->loadUserByUsername($pseudo);

        return $this->user;
    }

    /**
     * @param mixed         $credentials
     * @param UserInterface $user
     *
     * @return bool
     */
    public function checkCredentials($credentials, UserInterface $user)
    {
        if ((sha1($this->password) == $user->getPassword()) && ($this->pseudo == $user->getPseudo())) {
            return true;
        }
        throw new BadCredentialsException();
    }

    /**
     * @param Request        $request
     * @param TokenInterface $token
     * @param string         $providerKey
     *
     * @return null|RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        $this->session->set('pseudo', $this->pseudo);
        $this->session->set('userId', $this->user->getId());
        $this->session->set('avatar', $this->user->getAvatar());

        return new RedirectResponse('/');
    }

    /**
     * @param Request                 $request
     * @param AuthenticationException $exception
     *
     * @return null|RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);

        return new RedirectResponse('/connexion');
    }

    /**
     * @return bool
     */
    public function supportsRememberMe()
    {
        return false;
    }

    /**
     * @param Request                      $request
     * @param AuthenticationException|null $authException
     *
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $url = $this->router->generate('login');

        return new RedirectResponse($url);
    }
}
