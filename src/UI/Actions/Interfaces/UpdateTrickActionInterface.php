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

namespace App\UI\Actions\Interfaces;

use App\Domain\Form\FormHandler\UpdateTrickTypeHandler;
use App\Domain\Models\Tricks;
use App\UI\Responders\Interfaces\UpdatedTrickResponderInterface;
use App\UI\Responders\Interfaces\UpdateTrickResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interface UpdateTrickActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface UpdateTrickActionInterface
{
    /**
     * UpdateTrickActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory);

    /**
     * @param Request $request
     * @param Tricks $trick
     * @param UpdateTrickTypeHandler $updateTrickTypeHandler
     * @param UpdateTrickResponderInterface $updateTrickResponder
     * @param UrlGeneratorInterface $urlGenerator
     * 
     * @return mixed
     */
    public function __invoke(
        Request $request,
        Tricks $trick,
        UpdateTrickTypeHandler $updateTrickTypeHandler,
        UpdateTrickResponderInterface $updateTrickResponder,
        UrlGeneratorInterface $urlGenerator
    );
}
