<?php


namespace App\Controller;


use App\DTO\TrickAddDTO;
use App\Entity\Tricks;
use App\Form\FormHandler\UpdateTrickTypeHandler;
use App\Form\Type\UpdateTrickType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class UpdateTrickController
{

    private $twig;
    private $formFactory;
    private $dto;

    public function __construct(TrickAddDTO $dto, Environment $environment, FormFactoryInterface $formFactory) {

        $this->twig = $environment;
        $this->formFactory = $formFactory;
        $this->dto = $dto;
    }
    /**
     * @Route("/modifier/figure/{id}", name="update_trick")
     */
    public function __invoke(Request $request, Tricks $trick, UpdateTrickTypeHandler $updateTrickTypeHandler)
    {
        $form = $this->formFactory->create(UpdateTrickType::class, $trick)->handleRequest($request);
        $handledForm = $updateTrickTypeHandler->handle($form);

        if($handledForm) {

            return new Response($this->twig->render('updated_trick.html.twig', ['trick' => $trick]));
        }
        return new Response($this->twig->render('update_trick.html.twig', ['form' => $form->createView()]));
    }

}