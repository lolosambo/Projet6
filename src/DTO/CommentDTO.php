<?php


namespace App\DTO;


class CommentDTO
{
    /**
     * @var
     */
    public $content;

    /**
     * CommentDTO constructor.
     * @param $comment
     */
    public function __construct($comment = null) {
        $this->content = $comment;
    }

}