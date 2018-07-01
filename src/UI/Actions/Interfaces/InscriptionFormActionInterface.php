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

use App\Domain\Form\FormHandler\InscriptionTypeHandler;
use App\Domain\Services\Interfaces\MailerServiceInterface;
use App\UI\Responders\Interfaces\InscriptionFormResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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
     * @param FormFactoryInterface  $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory);

    /**
     * @param Request                            $request
     * @param InscriptionTypeHandler             $InscriptionTypeHandler
     * @param MailerServiceInterface             $mailer
     * @param UrlGeneratorInterface              $urlGenerator,
     * @param InscriptionFormResponderInterface  $inscriptionFormResponder
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        InscriptionTypeHandler $InscriptionTypeHandler,
        MailerServiceInterface $mailer,
        UrlGeneratorInterface $urlGenerator,
        InscriptionFormResponderInterface $inscriptionFormResponder
    );
}
