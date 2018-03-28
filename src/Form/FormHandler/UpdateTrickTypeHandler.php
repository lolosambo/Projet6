<?php


namespace App\Form\FormHandler;


use App\DTO\TrickAddDTO;
use App\Entity\Tricks;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use App\Form\FormHandler\FormTypeHandlerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class UpdateTrickTypeHandler implements FormTypeHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var TrickAddDTO
     */
    private $dto;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * UpdateTrickTypeHandler constructor.
     * @param SessionInterface $session
     * @param EntityManagerInterface $em
     * @param TrickAddDTO $dto
     */
    public function __construct(SessionInterface $session, EntityManagerInterface $em, TrickAddDTO $dto ) {
        $this->em = $em;
        $this->dto = $dto;
        $this->session = $session;
    }

    /**
     * @param FormInterface $formType
     */
    public function handle(FormInterface $updateTrickType) {

        if ($updateTrickType->isSubmitted() && $updateTrickType->isValid()) {

            $newTrick = new Tricks($this->dto->name, $this->dto->group, $this->dto->content);
            $newTrick->setUserId($this->session->get('userId'));
            $newTrick->setTrickUpdate(new \DateTime('NOW'));
            $this->em->flush();

            return true;
        }

        return false;
    }

}