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

namespace App\UI\Responders\Interfaces;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * class ReinitializePasswordResponderInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface  ReinitializePasswordResponderInterface
{

    /**
     * ReinitializePasswordResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param $data
     *
     * @return mixed|Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($data);
}