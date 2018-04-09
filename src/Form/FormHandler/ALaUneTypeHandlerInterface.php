<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\FormHandler;

use App\DTO\Interfaces\ALaUneDTOInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interface ALaUneTypeHandlerInterface.
 */
interface ALaUneTypeHandlerInterface
{
    public function handle(FormInterface $aLaUneType, ALaUneDTOInterface $dto, int $trickId);
}
