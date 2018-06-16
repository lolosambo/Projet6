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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     * @Route("/modifier/figure/{id}", name="update_trick")
     */
    public function __invoke(
        Request $request,
        Tricks $trick,
        UpdateTrickTypeHandler $updateTrickTypeHandler,
        UpdateTrickResponderInterface $updateTrickResponder,
        UpdatedTrickResponderInterface  $updatedTrickResponder
    ) {
        $form = $this->formFactory
            ->create(UpdateTrickType::class, $trick)
            ->handleRequest($request);
        if ($updateTrickTypeHandler->handle($form, $request->get('id'))) {
            return $updatedTrickResponder(['trick' => $trick]);
        }
        return $updateTrickResponder(['form' => $form->createView()]);
    }
}

