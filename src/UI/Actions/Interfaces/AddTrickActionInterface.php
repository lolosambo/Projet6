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

use App\Domain\Form\FormHandler\Interfaces\TrickAddTypeHandlerInterface;
use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Responders\Interfaces\AddedTrickResponderInterface;
use App\UI\Responders\Interfaces\AddTrickResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AddTrickActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface AddTrickActionInterface
{
    public function __construct(
        TricksRepositoryInterface $tr,
        FormFactoryInterface $formFactory
    );

    public function __invoke(
        Request $request,
        AddedTrickResponderInterface $addedTrickResponder,
        AddTrickResponderInterface $addTrickResponder,
        TrickAddTypeHandlerInterface $TrickTypeHandler
    );


}