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

namespace App\Domain\Services;

use App\Domain\Services\Interfaces\MailerServiceInterface;
use Swift_Image;
use Swift_Mailer;
use Swift_Message;
use Twig\Environment;

/**
 * Class MailerService.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class MailerService implements MailerServiceInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var Swift_Mailer $mailer
     */
    private $mailer;

    /**
     * MailerService constructor.
     *
     * @param Swift_Mailer $mailer
     * @param Environment $twig
     */
    public function __construct(Swift_Mailer $mailer,  Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

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
    public function __invoke(string $subject, string $mail, string $name, string $token, string $template)
    {
        $message = (new Swift_Message($subject));
        $logo = $message->embed(Swift_Image::fromPath('images/logo.png'));
        $message->setFrom('lolosambo2@gmail.com')
            ->setTo($mail)
            ->setBody($this->twig->render($template, [
                'name' => $name,
                'token' => $token,
                'logo' => $logo
            ]))
            ->setContentType("text/html");
        $this->mailer->send($message);
    }
}
