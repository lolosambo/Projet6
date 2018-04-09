<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\FormHandler;

use App\DTO\Interfaces\VideosDTOInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interface VideosTypeHandlerInterface.
 */
interface VideosTypeHandlerInterface
{
    public function handle(
        FormInterface $videosType,
        VideosDTOInterface $dto,
        int $trickId
    );
}
