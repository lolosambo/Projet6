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

/**
 * Interface FormTypeHandlerInterface.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface InscriptionTypeHandlerInterface
{
    /**
     * @param FormInterface $formType
     * @param MailerServiceInterface $mailer
     *
     * @return mixed
     */
    public function handle(FormInterface $formType, MailerServiceInterface $mailer);
}
