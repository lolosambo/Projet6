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

use App\Domain\Form\FormHandler\Interfaces\ReinitializePasswordTypeHandlerInterface;
use App\Domain\Form\Type\ReinitializePasswordType;
use App\UI\Actions\Interfaces\ReinitializePasswordActionInterface;
use App\UI\Responders\Interfaces\ReinitializePasswordResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * class ReinitializePasswordAction
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ReinitializePasswordAction implements ReinitializePasswordActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $factory;

    /**
     * ReinitializePasswordAction constructor.
     *
     * @param FormFactoryInterface $factory
     */
    public function __construct(FormFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @Route("/reinitialize/{id}", name = "reinitialize_password")
     *
     * @param Request $request
     * @param ReinitializePasswordTypeHandlerInterface $handler
     * @param UrlGeneratorInterface $urlGenerator
     * @param ReinitializePasswordResponderInterface $responder
     *
     * @return mixed|RedirectResponse|Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(
        Request $request,
        ReinitializePasswordTypeHandlerInterface $handler,
        UrlGeneratorInterface $urlGenerator,
        ReinitializePasswordResponderInterface $responder
    ) {
        $form = $this->factory->create(ReinitializePasswordType::class)
            ->handleRequest($request);
        if($handler->handle($form, $request)) {
            $request->getSession()->getFlashBag()->add(
                'notice', "Votre mot de passe a bien été réinitialisé. vous pouvez maintenant vous connecter."
            );
            return new RedirectResponse($urlGenerator->generate('homepage'));
        }
        return $responder(['form' => $form->createView()]);
    }
}