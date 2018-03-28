<?php


namespace App\Form\FormHandler;


use App\DTO\TrickAddDTO;
use Symfony\Component\Form\FormInterface;

interface TrickAddTypeHandlerInterface
{
    /**
     * @param FormInterface $trickType
     * @param TrickAddDTO $dto
     * @return mixed
     */
    public function handle(FormInterface $trickType, TrickAddDTO $dto);
}