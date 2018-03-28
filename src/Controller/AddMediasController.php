<?php


namespace App\Controller;


use App\DTO\MediasDTO;
use App\Form\FormHandler\MediasTypeHandlerInterface;
use App\Form\Type\MediasType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class AddMediasController
 * @package App\Controller
 * @Route("/ajout-medias/{id}", name="add_medias")
 */
class AddMediasController
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
     * @var FormFactoryInterface
     */
    private $formFactory;


    /**
     * AddMediasController constructor.
     * @param EntityManagerInterface $em
     * @param Environment $twig
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(EntityManagerInterface $em, Environment $twig, FormFactoryInterface $formFactory) {
        $this->em = $em;
        $this->twig = $twig;
        $this->formFactory = $formFactory;
    }

    /**
     * @param $id
     * @param Request $request
     * @param MediasDTO $mediaDto
     * @param MediasTypeHandlerInterface $mediaHandler
     */
    public function __invoke(int $id, Request $request, MediasDTO $mediaDto, MediasTypeHandlerInterface $mediaHandler) {

        $medias = $this->formFactory->create(MediasType::class, $mediaDto)->handleRequest($request);
        $HandledForm = $mediaHandler->handle($medias, $mediaDto, $id);

        if($HandledForm) {

            return new Response($this->twig->render('added_medias.html.twig'));
        }

        return new Response($this->twig->render('add_trick.html.twig', ['form' => $medias->createView()]));
    }


}