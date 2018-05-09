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

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\CommentDTOInterface;

/**
 * Class CommentDTO.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
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
     * @param $comment
     */
    public function __construct($comment = null)
    {
        $this->content = $comment;
    }
}
