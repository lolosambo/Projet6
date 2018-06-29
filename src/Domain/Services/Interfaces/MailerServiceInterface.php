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

namespace App\Domain\Services\Interfaces;

use Swift_Mailer;
use Twig\Environment;

/**
 * Class MailerService.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
Interface MailerServiceInterface
{
    /**
     * MailerService constructor.
     *
     * @param Swift_Mailer $mailer
     * @param Environment $twig
     */
    public function __construct(Swift_Mailer $mailer,  Environment $twig);

    /**
     * @param string $subject
     * @param string $mail
     * @param string $name
     * @param string $token
     * @param string $template
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(string $subject, string $mail, string $name, string $token, string $template);
}
