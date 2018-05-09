<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Domain\Repository\Interfaces;

/**
 * Interface GroupsRepositoryInterface.
 */
interface GroupsRepositoryInterface
{
    public function findOneByGroup($group);
}
