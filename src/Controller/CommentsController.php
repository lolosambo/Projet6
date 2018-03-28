<?php


namespace App\Controller;


use App\DTO\CommentDTO;
use App\Entity\Comments;
use App\Form\FormHandler\CommentTypeHandler;
use App\Form\Type\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Twig\Environment;


class CommentsController
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var
     */
    private $formBuilder;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var CommentDTO
     */
    private $dto;


    /**
     * CommentsController constructor.
     * @param Environment $twig
     * @param EntityManagerInterface $em
     * @param FormFactoryInterface $formFactory
     * @param SessionInterface $session
     * @param CommentDTO $dto
     */
    public function __construct(Environment $twig, EntityManagerInterface $em, FormFactoryInterface $formFactory, SessionInterface $session, CommentDTO $dto) {
        $this->twig = $twig;
        $this->em = $em;
        $this->formFactory = $formFactory;
        $this->session = $session;
        $this->dto = $dto;

    }

    /**
     * @param $trickId
     */
    public function getComments($trickId, CommentTypeHandler $commentTypeHandler){

        if($this->session->get('userId') !== null) {

            $addCommentForm = $this->formFactory->create(CommentType::class, $this->dto);
            $handledForm = $commentTypeHandler->handle($addCommentForm);

            if($handledForm) {

                return new Response($this->twig->render('comments.html.twig', ['comments' => $comments, 'addCommentForm' => $addCommentForm]));
            }

            return new \Exception('Le commentaire n\'a pas pu être publié');

        }
        return;

    }

}