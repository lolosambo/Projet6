<?php


namespace App\UI\Responders;


namespace App\UI\Responders;

use App\UI\Responders\Interfaces\AddTrickResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class AddImagesResponder
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
final class AddTrickResponder implements AddTrickResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * AddImagesResponder constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param $data
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($data)
    {
        return new Response(
            $this->twig->render('add_trick.html.twig', $data)
        );
    }
}
