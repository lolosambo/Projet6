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

namespace App\Listeners;

use App\Listeners\Interfaces\LoginExceptionListenerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Twig\Environment;

/**
 * Class LoginExceptionListener.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class LoginExceptionListener implements LoginExceptionListenerInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * LoginExceptionListener constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param GetResponseForExceptionEvent $event
     *
     * @return mixed|void
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if ( ! $event->getException() instanceof \Exception) {
            return;
        }
        $response = new Response($this->twig->render('404_user_already_registered.html.twig'));
        $event->setResponse($response);
    }
}
