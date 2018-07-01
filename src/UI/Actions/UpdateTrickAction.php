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

use App\Domain\Models\Tricks;
use App\Domain\Form\FormHandler\UpdateTrickTypeHandler;
use App\Domain\Form\Type\UpdateTrickType;
use App\UI\Actions\Interfaces\UpdateTrickActionInterface;
use App\UI\Responders\Interfaces\UpdatedTrickResponderInterface;
use App\UI\Responders\Interfaces\UpdateTrickResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class UpdateTrickAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class UpdateTrickAction implements UpdateTrickActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * UpdateTrickAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        FormFactoryInterface $formFactory
    ) {
        $this->formFactory = $formFactory;
    }

    /**
     * @Route("/modifier/figure/{slug}", name="update_trick")
     */
    public function __invoke(
        Request $request,
        Tricks $trick,
        UpdateTrickTypeHandler $handler,
        UpdateTrickResponderInterface $responder,
        UrlGeneratorInterface $urlGenerator
    ) {
        $form = $this->formFactory
            ->create(UpdateTrickType::class, $trick)
            ->handleRequest($request);
        if ($handler->handle($form, $request->get('slug'))) {
            $request->getSession()->getFlashBag()->add(
                'notice', 'La figure a bien été modifiée !'
            );
            return new RedirectResponse($urlGenerator->generate('single_trick', ['slug' => $request->get('slug')]));
        }
        return $responder(['form' => $form->createView()]);
    }
}

