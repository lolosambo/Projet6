<?php

namespace App\Form\FormHandler;

use App\DTO\TrickAddDTO;
use App\Entity\Tricks;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use App\Form\FormHandler\TrickAddTypeHandlerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class TrickTypeHandler implements TrickAddTypeHandlerInterface
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var EntityManagerInterface
     */
    private $em;


    /**
     * TrickTypeHandler constructor.
     * @param SessionInterface $session
     * @param EntityManagerInterface $em
     * @param TrickAddDTO $dto
     */
    public function __construct(SessionInterface $session, EntityManagerInterface $em) {
        $this->em = $em;
        $this->session = $session;
    }

    /**
     * @param FormInterface $trickType
     * @return bool
     */
    public function handle(FormInterface $trickType, TrickAddDTO $dto) {

        if ($trickType->isSubmitted() && $trickType->isValid()) {

            $trick = new Tricks($dto->name, $dto->group, $dto->content);
            $userId = $this->session->get('userId');
            $user = $this->em->getRepository('App\Entity\Users')->find($userId);
            $group = $this->em->getRepository('App\Entity\Groups')->findOneByGroup($dto->group->getGroup());

            $trick->setUser($user);
            $trick->setGroup($group);
            $trick->setTrickDate(new \DateTime('NOW'));
            $trick->setTrickUpdate(new \DateTime('NOW'));

            $this->em->persist($trick);
            $this->em->flush();

            return true;
        }

        return false;

    }

}