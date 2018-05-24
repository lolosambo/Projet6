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

use App\Domain\DTO\Interfaces\ImagesDTOInterface;
use App\Domain\Form\FormHandler\Interfaces\ImagesTypeHandlerInterface;
use App\UI\Responders\Interfaces\AddedImagesResponderInterface;
use App\UI\Responders\Interfaces\AddImagesResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

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
     * @param Request $request
     * @param AddedImagesResponderInterface $addedImagesResponder
     * @param AddImagesResponderInterface $addImagesResponder
     * @param ImagesDTOInterface $imagesDto
     * @param ImagesTypeHandlerInterface $imagesHandler
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        AddedImagesResponderInterface $addedImagesResponder,
        AddImagesResponderInterface $addImagesResponder,
        ImagesDTOInterface $imagesDto,
        ImagesTypeHandlerInterface $imagesHandler
    );
}
