<?php


namespace App\Controller;

use App\DTO\CommentDTO;
use App\Entity\Comments;
use App\Form\FormHandler\CommentTypeHandler;
use App\Form\Type\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;


class OneTrickController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var
     */
    private $formFactory;


    public function __construct(Environment $twig, EntityManagerInterface $em, FormFactoryInterface $formFactory, CommentDTO $dto) {
        $this->em = $em;
        $this->twig = $twig;
        $this->formFactory = $formFactory;
        $this->dto = $dto;

    }

    /**
     * @Route("/trick/{id}", name="single_trick")
     * @param int $id
     * @param SessionInterface $session
     * @param CommentTypeHandler $commentTypeHandler
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(int $id, Request $request, SessionInterface $session, CommentTypeHandler $commentTypeHandler) {

        $trick = $this->em->getRepository('App\Entity\Tricks')->find($id);
        $comments = $this->em->getRepository('App\Entity\Comments')->findByTrickId($id);
        $medias = $this->em->getRepository('App\Entity\Medias')->findBy(['trickId' =>$id]);
        $this->em->flush();

        $userId = $session->get('userId');

        if($userId) {
            $addCommentForm = $this->formFactory->create(CommentType::class, $this->dto)->handleRequest($request);
            $handledForm = $commentTypeHandler->handle($addCommentForm, $userId, $id);

            if ($handledForm) {

                return new RedirectResponse('/trick/'.$id);

            }

            return new Response($this->twig->render('oneTrick.html.twig', ['trick' => $trick, 'medias' => $medias, 'comments' => $comments, 'addCommentForm' => $addCommentForm->createView()]));

        }
        return new Response($this->twig->render('oneTrick.html.twig', ['trick' => $trick, 'medias' => $medias, 'comments' => $comments]));

    }

}