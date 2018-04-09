<?php

declare(strict_types=1);

/*
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 */

namespace App\Form\FormHandler;

use App\DTO\Interfaces\InscriptionUserDTOInterface;
use App\Entity\Users;
use App\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class InscriptionTypeHandler.
 */
class InscriptionTypeHandler implements FormTypeHandlerInterface
{
    /**
     * @var UsersRepositoryInterface
     */
    private $ur;

    /**
     * @var InscriptionUserDTOInterface
     */
    private $dto;

    /**
     * InscriptionTypeHandler constructor.
     *
     * @param UsersRepositoryInterface    $ur
     * @param InscriptionUserDTOInterface $dto
     */
    public function __construct(
        UsersRepositoryInterface $ur,
        InscriptionUserDTOInterface $dto
    ) {
        $this->ur = $ur;
        $this->dto = $dto;
    }

    /**
     * @param FormInterface $inscriptionType
     *
     * @return bool
     */
    public function handle(FormInterface $inscriptionType)
    {
        if ($inscriptionType->isSubmitted() && $inscriptionType->isValid()) {
            $encodedPass = sha1($this->dto->password);
            $user = new Users(
                $this->dto->pseudo,
                $encodedPass,
                $this->dto->mail
            );
            $user->setInscrDate(new \DateTime('NOW'));
            $this->ur->save($user);

            return true;
        }

        return false;
    }
}
