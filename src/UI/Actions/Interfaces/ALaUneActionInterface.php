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

use App\Domain\DTO\Interfaces\ALaUneDTOInterface;
use App\Domain\Form\FormHandler\Interfaces\ALaUneTypeHandlerInterface;
use App\UI\Responders\Interfaces\ALaUneResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface ALaUneActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface ALaUneActionInterface
{
    /**
     * ALaUneActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory);

    /**
     * @param Request $request
     * @param ALaUneResponderInterface $aLaUneResponder
     * @param ALaUneTypeHandlerInterface $aLaUneTypeHandler
     * @param ALaUneDTOInterface $dto
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        ALaUneResponderInterface $aLaUneResponder,
        ALaUneTypeHandlerInterface $aLaUneTypeHandler,
        ALaUneDTOInterface $dto
    );
}