<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\FormHandler;

use Symfony\Component\Form\FormInterface;

/**
 * Interface CommentTypeHandlerInterface.
 */
interface CommentTypeHandlerInterface
{
    /**
     * @param FormInterface $commentType
     * @param $userId
     * @param $trickId
     */
    public function handle(FormInterface $commentType, $userId, $trickId);
}
