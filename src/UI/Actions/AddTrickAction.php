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

use App\Domain\DTO\Interfaces\TricksAddDTOInterface;
use App\Domain\Form\FormHandler\Interfaces\TrickAddTypeHandlerInterface;
use App\Domain\Form\Type\TrickType;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Actions\Interfaces\AddTrickActionInterface;
use App\UI\Responders\Interfaces\AddedTrickResponderInterface;
use App\UI\Responders\Interfaces\AddTrickResponderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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
    private $tr;

    /**
     * AddTrickAction constructor.
     *
     * @param TricksRepositoryInterface $tr
     * @param FormFactoryInterface      $formFactory
     */
    public function __construct(
        TricksRepositoryInterface $tr,
        FormFactoryInterface $formFactory
    ) {
        $this->formFactory = $formFactory;
        $this->tr = $tr;
    }

    /**
     * @Route("/ajouter/figure", name="add_trick")
     *
     * @param Request $request
     * @param AddedTrickResponderInterface $addedTrickResponder
     * @param AddTrickResponderInterface $addTrickResponder
     * @param TrickAddTypeHandlerInterface $TrickTypeHandler
     * @param TricksAddDTOInterface $trickDto
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        AddedTrickResponderInterface $addedTrickResponder,
        AddTrickResponderInterface $addTrickResponder,
        TrickAddTypeHandlerInterface $TrickTypeHandler,
        TricksAddDTOInterface $trickDto
    ) {
        $form = $this->formFactory
            ->create(TrickType::class, $trickDto)
            ->handleRequest($request);



        if ($TrickTypeHandler->handle($request, $form, $trickDto)) {
            $trick = $this->tr->findOneByContent($trickDto->content);

            return $addedTrickResponder(['trick' => $trick]);
        }

        return $addTrickResponder(['form' => $form->createView()]);
    }
}
