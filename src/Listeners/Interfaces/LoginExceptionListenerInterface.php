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

namespace App\Listeners\Interfaces;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Class LoginExceptionListenerInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface LoginExceptionListenerInterface
{
    /**
     * LoginExceptionListenerInterface constructor.
     *
     * @param Environment $twig,
     */
    public function __construct(Environment $twig);

    /**
     * @param GetResponseForExceptionEvent $event
     *
     * @return mixed
     */
    public function onKernelException(GetResponseForExceptionEvent $event);
}