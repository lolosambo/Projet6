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

use App\UI\Responders\Interfaces\ConnectionFormResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ConnectionFormResponder
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
final class ConnectionFormResponder implements ConnectionFormResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ConnectionFormResponder constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param $data
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($data)
    {
        return new Response(
            $this->twig->render('login.html.twig', $data)
        );
    }
}



