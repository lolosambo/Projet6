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

namespace App\UI\Actions\Interfaces;

use App\Domain\Repository\Interfaces\TricksRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interface DeleteTrickActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface DeleteTrickActionInterface
{
    /**
     * DeleteTrickActionInterface constructor.
     *
     * @param TricksRepositoryInterface $tr
     */
    public function __construct(TricksRepositoryInterface $tr);

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request, UrlGeneratorInterface $generator);
}
