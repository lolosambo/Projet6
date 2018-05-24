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

use App\Domain\DTO\Interfaces\InscriptionUserDTOInterface;
use App\Domain\Form\FormHandler\InscriptionTypeHandler;
use App\UI\Responders\Interfaces\InscriptionFormResponderInterface;
use App\UI\Responders\Interfaces\InscriptionStatusResponderInterface;
use Swift_Mailer;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

/**
 * Interface InscriptionFormActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface InscriptionFormActionInterface
{
    /**
     * InscriptionFormActionInterface constructor.
     *
     * @param InscriptionUserDTOInterface $dto
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        InscriptionUserDTOInterface $dto,
        FormFactoryInterface $formFactory,
        Environment $twig
    );

    /**
     * @param Request $request
     * @param InscriptionTypeHandler $InscriptionTypeHandler
     * @param Swift_Mailer $mailer
     * @param InscriptionStatusResponderInterface $inscriptionStatusResponder
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        InscriptionTypeHandler $InscriptionTypeHandler,
        Swift_Mailer $mailer,
        InscriptionStatusResponderInterface $inscriptionStatusResponder,
        InscriptionFormResponderInterface $inscriptionFormResponder
    );
}