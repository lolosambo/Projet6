<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\FormHandler;

use App\DTO\Interfaces\MediasDTOInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interface MediasTypeHandlerInterface.
 */
interface MediasTypeHandlerInterface
{
    /**
     * @param FormInterface      $mediasType
     * @param MediasDTOInterface $dto
     * @param int                $trickId
     *
     * @return mixed
     */
    public function handle(
        FormInterface $mediasType,
        MediasDTOInterface $dto,
        int $trickId
    );
}
