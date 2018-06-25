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


use App\Domain\Form\FormHandler\Interfaces\ImagesTypeHandlerInterface;
use App\UI\Responders\Interfaces\AddImagesResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interface AddImagesActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface AddImagesActionInterface
{
    /**
     * AddImagesActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory);

    /**
     * @param Request                      $request
     * @param UrlGeneratorInterface        $urlGenerator
     * @param AddImagesResponderInterface  $addImagesResponder
     * @param ImagesTypeHandlerInterface   $imagesHandler
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        UrlGeneratorInterface $urlGenerator,
        AddImagesResponderInterface $addImagesResponder,
        ImagesTypeHandlerInterface $imagesHandler
    );
}
