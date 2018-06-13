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
use App\UI\Responders\Interfaces\IndexResponderInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface IndexActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface IndexActionInterface
{
    /**
     * IndexActionInterface constructor.
     *
     * @param TricksRepositoryInterface $tricksRepository
     */
    public function __construct(TricksRepositoryInterface $tricksRepository);

    /**
     * @param Request $request
     * @param IndexResponderInterface $indexResponder
     *
     * @return mixed
     */
    public function __invoke(Request $request, IndexResponderInterface $indexResponder);
}
