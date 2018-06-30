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

namespace App\Domain\Form\FormHandler\Interfaces;

use App\Domain\Services\Interfaces\MailerServiceInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interface FormTypeHandlerInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface InscriptionTypeHandlerInterface
{
    /**
     * @param Request $request
     * @param FormInterface $inscriptionType
     * @param MailerServiceInterface $mailer
     *
     * @return mixed
     */
    public function handle(
        Request $request,
        FormInterface $inscriptionType,
        MailerServiceInterface $mailer
    );
}
