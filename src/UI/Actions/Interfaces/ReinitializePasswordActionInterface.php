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

namespace App\UI\Actions\Interfaces;

use App\Domain\Form\FormHandler\Interfaces\ReinitializePasswordTypeHandlerInterface;
use App\UI\Responders\Interfaces\ReinitializePasswordResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * interface ReinitializePasswordActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface ReinitializePasswordActionInterface
{
    /**
     * ReinitializePasswordActionInterface constructor.
     * @param FormFactoryInterface $factory
     */
    public function __construct(FormFactoryInterface $factory);

    /**
     * @Route("/reinitialize/{id}", name = "reinitialize_password")
     *
     * @param Request $request
     * @param ReinitializePasswordTypeHandlerInterface $handler
     * @param UrlGeneratorInterface $urlGenerator
     *
     * @return mixed|Response
     */
    public function __invoke(
        Request $request,
        ReinitializePasswordTypeHandlerInterface $handler,
        UrlGeneratorInterface $urlGenerator,
        ReinitializePasswordResponderInterface $responder
    );
}