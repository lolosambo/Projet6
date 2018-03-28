<?php

namespace App\Form\FormHandler;

use App\DTO\MediasDTO;
use Symfony\Component\Form\FormInterface;


interface MediasTypeHandlerInterface
{

    /**
     * @param FormInterface $mediasType
     * @param MediasDTO $dto
     * @param int $trickId
     * @return mixed
     */
    public function handle(FormInterface $mediasType, MediasDTO $dto, int $trickId);
}