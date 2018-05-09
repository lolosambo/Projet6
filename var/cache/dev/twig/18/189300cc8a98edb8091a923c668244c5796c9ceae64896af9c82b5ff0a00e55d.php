<?php

/* email_inscription.html.twig */
class __TwigTemplate_c883c3a143aa25c2200e17691415bd148a1034dd6c593f0c898d51ee6afaa8d4 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "email_inscription.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "email_inscription.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" rel=\"stylesheet\"
          integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\"
          crossorigin=\"anonymous\"/>
    <script defer src=\"https://use.fontawesome.com/releases/v5.0.7/js/all.js\"></script>
    <link href=\"../css/style.css\" rel=\"stylesheet\" type=\"text/css\" />

    <link href=\"https://fonts.googleapis.com/css?family=Teko:500\" rel=\"stylesheet\" />
    <link href=\"https://fonts.googleapis.com/css?family=Kanit:200|Teko:500\" rel=\"stylesheet\" />
    <link href=\"https://fonts.googleapis.com/css?family=Shadows+Into+Light\" rel=\"stylesheet\">

    <title><h1>Confirmation d'inscription</h1></title>
</head>

<body>

<div class=\"container-fluid\">
    <div class=\"row\">
        <div class=\"col-lg-12 col-md-12 col-sm-12\">
            <img src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\HttpFoundationExtension']->generateAbsoluteUrl($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo.png")), "html", null, true);
        echo "\"><br><br>
        </div>
    </div><br><br>

    <div class=\"row\" id=\"content\">
        <div class=\"col-lg-12 col-md-12 col-sm-12 content\">
            <h3>Bienvenue !</h3>
            <p> Bonjour ";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new Twig_Error_Runtime('Variable "name" does not exist.', 30, $this->source); })()), "html", null, true);
        echo "! Vous êtes désormais enregistré en tant que membre de Snowtricks.</p>
            <p>Afin d'activer votre compte définitivement, veuillez cliquer sur le lien ci-dessous.</p>
            <p><a href=\"/validation_compte/";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["token"]) || array_key_exists("token", $context) ? $context["token"] : (function () { throw new Twig_Error_Runtime('Variable "token" does not exist.', 32, $this->source); })()), "html", null, true);
        echo "\">Valider votre compte</a></p>
        </div>
    </div>
</div>

</body>
</html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "email_inscription.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 32,  63 => 30,  53 => 23,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" rel=\"stylesheet\"
          integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\"
          crossorigin=\"anonymous\"/>
    <script defer src=\"https://use.fontawesome.com/releases/v5.0.7/js/all.js\"></script>
    <link href=\"../css/style.css\" rel=\"stylesheet\" type=\"text/css\" />

    <link href=\"https://fonts.googleapis.com/css?family=Teko:500\" rel=\"stylesheet\" />
    <link href=\"https://fonts.googleapis.com/css?family=Kanit:200|Teko:500\" rel=\"stylesheet\" />
    <link href=\"https://fonts.googleapis.com/css?family=Shadows+Into+Light\" rel=\"stylesheet\">

    <title><h1>Confirmation d'inscription</h1></title>
</head>

<body>

<div class=\"container-fluid\">
    <div class=\"row\">
        <div class=\"col-lg-12 col-md-12 col-sm-12\">
            <img src=\"{{ absolute_url(asset('images/logo.png')) }}\"><br><br>
        </div>
    </div><br><br>

    <div class=\"row\" id=\"content\">
        <div class=\"col-lg-12 col-md-12 col-sm-12 content\">
            <h3>Bienvenue !</h3>
            <p> Bonjour {{ name }}! Vous êtes désormais enregistré en tant que membre de Snowtricks.</p>
            <p>Afin d'activer votre compte définitivement, veuillez cliquer sur le lien ci-dessous.</p>
            <p><a href=\"/validation_compte/{{ token }}\">Valider votre compte</a></p>
        </div>
    </div>
</div>

</body>
</html>", "email_inscription.html.twig", "/var/www/snowtricks/templates/email_inscription.html.twig");
    }
}
