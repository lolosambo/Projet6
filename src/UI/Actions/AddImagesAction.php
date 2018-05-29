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

use App\Domain\Form\FormHandler\Interfaces\ImagesTypeHandlerInterface;
use App\Domain\Form\Type\ImagesType;
use App\UI\Actions\Interfaces\AddImagesActionInterface;
use App\UI\Responders\Interfaces\AddedImagesResponderInterface;
use App\UI\Responders\Interfaces\AddImagesResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AddImagesAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 *
 * @Route("/ajout-medias/{id}", name="add_medias")
 */
class AddImagesAction implements AddImagesActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * AddMediasController constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @param AddedImagesResponderInterface $addedImagesResponder
     * @param AddImagesResponderInterface   $addImagesResponder
     * @param Request                       $request
     * @param ImagesTypeHandlerInterface    $imagesHandler
     *
     * @return AddedImagesResponderInterface|mixed
     */
    public function __invoke(
        Request $request,
        AddedImagesResponderInterface $addedImagesResponder,
        AddImagesResponderInterface $addImagesResponder,
        ImagesTypeHandlerInterface $imagesHandler
    ) {
        $images = $this->formFactory
            ->create(ImagesType::class)
            ->handleRequest($request);
        if ($imagesHandler->handle($images, intval($request->get('id')))) {
            return  $addedImagesResponder();
        }
        return $addImagesResponder(['form' => $images->createView()]);
    }
}

