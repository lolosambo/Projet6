<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\DTO\Interfaces;

/**
 * Interface CommentDTOInterface.
 */
interface CommentDTOInterface
{
    /**
     * CommentDTOInterface constructor.
     *
     * @param null $comment
     */
    public function __construct(string $comment = null);
}
