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

use App\UI\Responders\Interfaces\OneTrickResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class OneTrickResponder
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
final class OneTrickResponder implements OneTrickResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * OneTrickResponder constructor.
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
    public function __invoke(Request $request, $data)
    {
        $response = new Response(
            $this->twig->render('oneTrick.html.twig', $data)
        );
        $response->setEtag(md5('Once_Upon_A_Time_Validation_Cache'.rand(10000000, 99999999)));
        $response->setPublic();
        $response->isNotModified($request);
        return $response;
    }
}

