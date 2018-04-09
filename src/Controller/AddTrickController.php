<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Controller;

use App\DTO\Interfaces\TricksAddDTOInterface;
use App\Form\FormHandler\TrickAddTypeHandlerInterface;
use App\Form\Type\TrickType;
use App\Repository\Interfaces\TricksRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

/**
 * Class AddTrickController.
 */
class AddTrickController
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var TricksRepositoryInterface
     */
    private $tr;

    /**
     * AddTrickController constructor.
     *
     * @param Environment               $twig
     * @param TricksRepositoryInterface $tr
     * @param FormFactoryInterface      $formFactory
     */
    public function __construct(
        Environment $twig,
        TricksRepositoryInterface $tr,
        FormFactoryInterface $formFactory
    ) {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->tr = $tr;
    }

    /**
     * @Route("/ajouter/figure", name="add_trick")
     */
    public function __invoke(
        Request $request,
        TrickAddTypeHandlerInterface $TrickTypeHandler,
        TricksAddDTOInterface $trickDto
    ) {
        $form = $this->formFactory
            ->create(TrickType::class, $trickDto)
            ->handleRequest($request);

        $collection = new ArrayCollection();

        if ($TrickTypeHandler->handle($request, $form, $trickDto, $collection)) {
            $trick = $this->tr->findOneByContent($trickDto->content);

            return new Response($this->twig
                ->render('added_trick.html.twig', ['trick' => $trick]));
        }

        return new Response($this->twig
            ->render('add_trick.html.twig', ['form' => $form->createView()]));
    }
}
