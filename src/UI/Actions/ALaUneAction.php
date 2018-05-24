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

use App\Domain\DTO\Interfaces\ALaUneDTOInterface;
use App\Domain\Form\FormHandler\Interfaces\ALaUneTypeHandlerInterface;
use App\UI\Actions\Interfaces\ALaUneActionInterface;
use App\UI\Responders\Interfaces\ALaUneResponderInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Domain\Form\Type\ALaUneType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ALaUneAction.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ALaUneAction implements ALaUneActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * ALaUneAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @Route("/image_a_la_une/{id}", name = "frontPage_image")
     *
     * @param Request                    $request
     * @param ALaUneTypeHandlerInterface $aLaUneTypeHandler
     * @param ALaUneDTOInterface         $dto
     *
     * @return RedirectResponse|Response
     */
    public function __invoke(
        Request $request,
        ALaUneResponderInterface $aLaUneResponder,
        ALaUneTypeHandlerInterface $aLaUneTypeHandler,
        ALaUneDTOInterface $dto
    ) {
        $id = intval($request->get('id'));
        $form = $this->formFactory
            ->create(ALaUneType::class, $dto, ['trickId' => $id])
            ->handleRequest($request);

        if ($aLaUneTypeHandler->handle($form, $id)) {
            return new RedirectResponse('/trick/'.$id);
        }

        return $aLaUneResponder(['form' => $form->createView()]);
    }
}
