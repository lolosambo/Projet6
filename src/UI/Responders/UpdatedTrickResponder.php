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

use App\UI\Responders\Interfaces\UpdatedTrickResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class UpdatedTrickResponder
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class UpdatedTrickResponder implements UpdatedTrickResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * UpdatedTrickResponder constructor.
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
        return new Response($this->twig->render('updated_trick.html.twig', $data));
    }
}

