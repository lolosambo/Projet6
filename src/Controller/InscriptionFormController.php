<?php


namespace App\Controller;

use App\DTO\InscriptionUserDTO;
use App\Form\FormHandler\InscriptionTypeHandler;
use App\Form\Type\InscriptionType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

class InscriptionFormController
{

    /**
     * @var InscriptionUserDTO
     */
    private $dto;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * InscriptionFormController constructor.
     * @param InscriptionUserDTO $dto
     * @param EntityManagerInterface $em
     * @param FormFactoryInterface $formFactory
     * @param Environment $environment
     */
    public function __construct(InscriptionUserDTO $dto, FormFactoryInterface $formFactory, Environment $environment) {
        $this->dto = $dto;
        $this->formFactory = $formFactory;
        $this->twig = $environment;
    }

    /**
     * @Route("/inscription", name="inscription")
     * @Method({"GET", "POST"})
     */
    public function __invoke(Request $request, InscriptionTypeHandler $InscriptionTypeHandler) {

        $form = $this->formFactory->create(InscriptionType::class, $this->dto)->handleRequest($request);
        $handledForm = $InscriptionTypeHandler->handle($form);

        if($handledForm) {

            return new Response($this->twig->render('inscription_status.html.twig'));
        }

        return  new Response($this->twig->render('inscription.html.twig', ['form' => $form->createView()]));
    }
}
