<?php
namespace App\Form\FormHandler;

use App\DTO\InscriptionUserDTO;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use App\Form\FormHandler\FormTypeHandlerInterface;

class InscriptionTypeHandler implements FormTypeHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var InscriptionUserDTO
     */
    private $dto;

    /**
     * InscriptionTypeHandler constructor.
     * @param EntityManagerInterface $em
     * @param InscriptionUserDTO $dto
     */
    public function __construct(EntityManagerInterface $em, InscriptionUserDTO $dto ) {
        $this->em = $em;
        $this->dto = $dto;
    }

    /**
     * @param FormInterface $inscriptionType
     * @return bool
     */
    public function handle(FormInterface $inscriptionType) {

        if ($inscriptionType->isSubmitted() && $inscriptionType->isValid()) {
            $encodedPass = sha1($this->dto->password);
            $user = new Users($this->dto->pseudo, $encodedPass, $this->dto->mail);
            $user->setInscrDate(new \DateTime('NOW'));
            $this->em->persist($user);
            $this->em->flush();

            return true;
        }

        return false;

    }



}