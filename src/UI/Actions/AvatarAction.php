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

use App\Domain\Form\FormHandler\Interfaces\AvatarTypeHandlerInterface;
use App\Domain\Form\Type\AvatarType;
use App\UI\Actions\Interfaces\AvatarActionInterface;
use App\UI\Responders\Interfaces\AddAvatarResponderInterface;
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
 * @Route(path="/avatar", name="avatar")
 */
class AvatarAction implements AvatarActionInterface
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
     * @param AddAvatarResponderInterface  $addAvatarResponder
     * @param UrlGeneratorInterface        $urlGenerator,
     * @param AvatarTypeHandlerInterface   $avatarTypeHandler
     * @return mixed
     */
    public function __invoke(
        Request $request,
        AddAvatarResponderInterface $addAvatarResponder,
        UrlGeneratorInterface $urlGenerator,
        AvatarTypeHandlerInterface $avatarTypeHandler
    ) {
        $avatar = $this->formFactory
            ->create(AvatarType::class)
            ->handleRequest($request);
        if ($avatarTypeHandler->handle($avatar)) {
            $request->getSession()->getFlashBag()->add(
                'notice', 'L\'avatar a été changé avec succès !'
            );
            return new RedirectResponse($urlGenerator->generate('homepage'));
        }
        return $addAvatarResponder(['form' => $avatar->createView()]);
    }
}
