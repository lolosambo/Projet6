<?php


namespace App\Form\FormHandler;


use Symfony\Component\Form\FormInterface;

interface CommentTypeHandlerInterface
{
    /**
     * @param FormInterface $commentType
     * @param $userId
     * @param $trickId
     */
    public function handle(FormInterface $commentType, $userId, $trickId);

}