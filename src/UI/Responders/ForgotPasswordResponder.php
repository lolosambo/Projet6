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

namespace App\UI\Responders;

use App\UI\Responders\Interfaces\ForgotPasswordResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * class ForgotPasswordResponder
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
final class ForgotPasswordResponder implements ForgotPasswordResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ReinitializePasswordResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param $data
     *
     * @return mixed|Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($data)
    {
        $response = new Response(
            $this->twig->render('Forgot_password.html.twig', $data)
        );
        return $response;
    }
}