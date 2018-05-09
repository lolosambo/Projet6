<?php

/* login.html.twig */
class __TwigTemplate_e42c59d96399774ec2ee529c217b41bd0e9cc55171e54ff580c9325243049c01 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "login.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "login.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "SNOWTRICKS";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 5
        echo "
<div class=\"col-lg-7 col-md-12 col-sm-12 header-login\">
    <br><div class=\"container\">
        <div class=\"row\">

            ";
        // line 10
        if ((isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 10, $this->source); })())) {
            // line 11
            echo "                <div>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 11, $this->source); })()), "messageKey", array()), twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 11, $this->source); })()), "messageData", array()), "security"), "html", null, true);
            echo "</div>
            ";
        }
        // line 13
        echo "
             <div class=\"offset-lg-4 col-lg-8 offset-md-2 col-md-8 offset-sm-1 col-sm-10 col-12 form\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <h1><i class=\"fas fa-unlock-alt\" style=\"font-size: 25px;\"></i> Se connecter</h1></div>
                    <div>
                        <form class=\"form-horizontal\" action=\"";
        // line 19
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
        echo "\" method=\"post\" role=\"form\">
                            <div class=\"form-group\">
                                <label for=\"pseudo\" class=\"col-sm-6 control-label\">
                                    Utilisateur </label>
                                <input type=\"text\" name=\"pseudo\" class=\" form-control col-sm-12\"/>
                            <div class=\"form-group\">
                                <label for=\"password\" class=\"col-sm-6 control-label\">
                                    Mot de passe
                                    </label>
                                <input type=\"password\" name=\"password\" class=\" form-control col-sm-12\"/>
                            </div>

                            <div class=\"form-group last\">
                                <div class=\"col-sm-offset-1 col-sm-11\">
                                   <button type=\"submit\" name=\"connecter\" class=\"btn btn-success btn-sm\">Se connecter</button>
                                    <button type=\"submit\" name=\"reinitialiser\" class=\"btn btn-default btn-sm\">Réinitialiser</button>
                                </div><br>
                            </div>
                        </form>
                    </div>
                    <div class=\"panel-footer\">
                        Pas encore enregistré ? <a href=\"/inscription\">Inscrivez-vous !</a></div><br>
                </div>
                <a href=\"/\">Revenir à la page d'accueil</a>
            </div>
        </div>
    </div><br><br><br>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 19,  87 => 13,  81 => 11,  79 => 10,  72 => 5,  63 => 4,  45 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

{% block title %}SNOWTRICKS{% endblock %}
{% block header %}

<div class=\"col-lg-7 col-md-12 col-sm-12 header-login\">
    <br><div class=\"container\">
        <div class=\"row\">

            {% if error %}
                <div>{{ error.messageKey|trans(error.messageData, 'security') }}</div>
            {% endif %}

             <div class=\"offset-lg-4 col-lg-8 offset-md-2 col-md-8 offset-sm-1 col-sm-10 col-12 form\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <h1><i class=\"fas fa-unlock-alt\" style=\"font-size: 25px;\"></i> Se connecter</h1></div>
                    <div>
                        <form class=\"form-horizontal\" action=\"{{ path('login') }}\" method=\"post\" role=\"form\">
                            <div class=\"form-group\">
                                <label for=\"pseudo\" class=\"col-sm-6 control-label\">
                                    Utilisateur </label>
                                <input type=\"text\" name=\"pseudo\" class=\" form-control col-sm-12\"/>
                            <div class=\"form-group\">
                                <label for=\"password\" class=\"col-sm-6 control-label\">
                                    Mot de passe
                                    </label>
                                <input type=\"password\" name=\"password\" class=\" form-control col-sm-12\"/>
                            </div>

                            <div class=\"form-group last\">
                                <div class=\"col-sm-offset-1 col-sm-11\">
                                   <button type=\"submit\" name=\"connecter\" class=\"btn btn-success btn-sm\">Se connecter</button>
                                    <button type=\"submit\" name=\"reinitialiser\" class=\"btn btn-default btn-sm\">Réinitialiser</button>
                                </div><br>
                            </div>
                        </form>
                    </div>
                    <div class=\"panel-footer\">
                        Pas encore enregistré ? <a href=\"/inscription\">Inscrivez-vous !</a></div><br>
                </div>
                <a href=\"/\">Revenir à la page d'accueil</a>
            </div>
        </div>
    </div><br><br><br>
</div>
{% endblock %}

", "login.html.twig", "/var/www/snowtricks/templates/login.html.twig");
    }
}
