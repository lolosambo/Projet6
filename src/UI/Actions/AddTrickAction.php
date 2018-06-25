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

use App\Domain\Form\FormHandler\Interfaces\TrickAddTypeHandlerInterface;
use App\Domain\Form\Type\TrickType;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Actions\Interfaces\AddTrickActionInterface;
use App\UI\Responders\Interfaces\AddTrickResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class AddTrickAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class AddTrickAction implements AddTrickActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var TricksRepositoryInterface
     */
    private $trickRepository;

    /**
     * AddTrickAction constructor.
     *
     * @param TricksRepositoryInterface $trickRepository
     * @param FormFactoryInterface      $formFactory
     */
    public function __construct(
        TricksRepositoryInterface $trickRepository,
        FormFactoryInterface $formFactory
    ) {
        $this->formFactory = $formFactory;
        $this->trickRepository = $trickRepository;
    }

    /**
     * @Route("/ajouter/figure", name="add_trick")
     *
     * @param Request                       $request
     * @param UrlGeneratorInterface         $urlGenerator
     * @param AddTrickResponderInterface    $addTrickResponder
     * @param TrickAddTypeHandlerInterface  $TrickTypeHandler
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        UrlGeneratorInterface $urlGenerator,
        AddTrickResponderInterface $addTrickResponder,
        TrickAddTypeHandlerInterface $TrickTypeHandler
    ) {
        $form = $this->formFactory
            ->create(TrickType::class)
            ->handleRequest($request);

        if ($TrickTypeHandler->handle($form)) {
            $trick = $this->trickRepository->findOneByName($form->get('name')->getData());
            $request->getSession()->getFlashBag()->add(
                'notice', 'La figure a bien été ajoutée !'
            );
            return new RedirectResponse($urlGenerator->generate('homepage'));
        }
        return $addTrickResponder(['form' => $form->createView()]);
    }
}
