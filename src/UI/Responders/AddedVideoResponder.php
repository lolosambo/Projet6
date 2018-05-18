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

use App\UI\Responders\Interfaces\AddedVideoResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class AddedVideoResponder
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class AddedVideoResponder implements AddedVideoResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * AddedVideoResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke()
    {
        return new Response(
            $this->twig->render('added_medias.html.twig')
        );
    }
}
