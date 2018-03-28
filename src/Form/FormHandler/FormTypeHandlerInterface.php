<?php


namespace App\Form\FormHandler;

use Symfony\Component\Form\FormInterface;


interface FormTypeHandlerInterface
{
    /**
     * @param FormInterface $formType
     */
    public function handle(FormInterface $formType);

}