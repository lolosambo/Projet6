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
use App\UI\Responders\Interfaces\AddImagesResponderInterface;
use App\UI\Responders\Interfaces\OneTrickResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class AddImagesAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 *
 * @Route("/ajout-medias/{slug}", name="add_medias")
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
     * @param Request                      $request
     * @param OneTrickResponderInterface   $OneTrickResponder
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
    ) {
        $images = $this->formFactory
            ->create(ImagesType::class)
            ->handleRequest($request);
        if ($imagesHandler->handle($images, $request->get('slug'))) {
            $request->getSession()->getFlashBag()->add(
                'notice', 'La(es) image(s) a(ont) bien été ajoutée(s) !'
            );
            return new RedirectResponse($urlGenerator->generate('single_trick', ['slug' => $request->get('slug')]));
        }
        return $addImagesResponder(['form' => $images->createView()]);
    }
}

