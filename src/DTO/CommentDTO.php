<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\DTO;

use App\DTO\Interfaces\CommentDTOInterface;

/**
 * Class CommentDTO.
 */
class CommentDTO implements CommentDTOInterface
{
    /**
     * @var string
     */
    public $content;

    /**
     * CommentDTO constructor.
     *
     * @param string $comment
     */
    public function __construct(string $comment = null)
    {
        $this->content = $comment;
    }
}
