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

use App\Domain\Form\FormHandler\Interfaces\AvatarTypeHandlerInterface;
use App\UI\Responders\Interfaces\AddAvatarResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class AvatarActionInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 *
 * @Route("/avatar", name="avatar")
 */
Interface AvatarActionInterface
{
    /**
     * AvatarActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory);

    /**
     * @param Request                      $request
     * @param AddAvatarResponderInterface  $addAvatarResponder
     * @param UrlGeneratorInterface        $urlGenerator
     * @param AvatarTypeHandlerInterface   $avatarTypeHandler
     * @return mixed
     */
    public function __invoke(
        Request $request,
        AddAvatarResponderInterface $addAvatarResponder,
        UrlGeneratorInterface $urlGenerator,
        AvatarTypeHandlerInterface $avatarTypeHandler
    );
}
