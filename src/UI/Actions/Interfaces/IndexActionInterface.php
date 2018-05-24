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

use App\Domain\Repository\TricksRepository;
use App\UI\Responders\Interfaces\IndexResponderInterface;

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
     * @param TricksRepository $tr
     */
    public function __construct(TricksRepository $tr);

    /**
     * @param IndexResponderInterface $indexResponder
     *
     * @return mixed
     */
    public function __invoke(IndexResponderInterface $indexResponder);
}
