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

use Twig\Environment;

/**
 * Interface AddImagesResponderInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface AccountValidatedResponderInterface
{
    /**
     * AccountValidatedResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @return mixed
     */
    public function __invoke();
}
