<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Controller;

use App\Entity\Tricks;
use App\Form\FormHandler\UpdateTrickTypeHandler;
use App\Form\Type\UpdateTrickType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class UpdateTrickController.
 */
class UpdateTrickController
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * UpdateTrickController constructor.
     *
     * @param Environment          $environment
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        Environment $environment,
        FormFactoryInterface $formFactory
    ) {
        $this->twig = $environment;
        $this->formFactory = $formFactory;
    }

    /**
     * @Route("/modifier/figure/{id}", name="update_trick")
     */
    public function __invoke(
        Request $request,
        Tricks $trick,
        UpdateTrickTypeHandler $updateTrickTypeHandler
    ) {
        $form = $this->formFactory
            ->create(UpdateTrickType::class, $trick)
            ->handleRequest($request);

        if ($updateTrickTypeHandler->handle($form, intval($request->get('id')))) {
            return new Response($this->twig
                ->render('updated_trick.html.twig', ['trick' => $trick]));
        }

        return new Response($this->twig
            ->render('update_trick.html.twig', ['form' => $form->createView()]));
    }
}
