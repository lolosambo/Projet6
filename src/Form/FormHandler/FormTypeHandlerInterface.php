<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\FormHandler;

use Symfony\Component\Form\FormInterface;

/**
 * Interface FormTypeHandlerInterface.
 */
interface FormTypeHandlerInterface
{
    /**
     * @param FormInterface $formType
     */
    public function handle(FormInterface $formType);
}
