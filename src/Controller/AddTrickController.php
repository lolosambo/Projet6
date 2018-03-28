<?php


namespace App\Controller;


use App\DTO\TrickAddDTO;
use App\Form\FormHandler\TrickAddTypeHandlerInterface;
use App\Form\Type\TrickType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Tricks;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

class AddTrickController
{

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var EntityManagerInterface
     */
    private $em;


    /**
     * AddTrickController constructor.
     * @param Environment $twig
     * @param EntityManagerInterface $em
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(Environment $twig, EntityManagerInterface $em, FormFactoryInterface $formFactory){
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->em = $em;
    }
    /**
     * @Route("/ajouter/figure", name="add_trick")
     */
    public function __invoke(Request $request, TrickAddTypeHandlerInterface $TrickTypeHandler, TrickAddDTO $trickDto) {

        $form = $this->formFactory->create(TrickType::class, $trickDto)->handleRequest($request);
        $trickHandledForm = $TrickTypeHandler->handle($form, $trickDto);

        if($trickHandledForm) {

            $trick = $this->em->getRepository('App\Entity\Tricks')->findOneByContent($trickDto->content);

            return new Response($this->twig->render('added_trick.html.twig', ['trick' => $trick]));
        }

        return new Response($this->twig->render('add_trick.html.twig', ['form' => $form->createView()]));
    }
}
