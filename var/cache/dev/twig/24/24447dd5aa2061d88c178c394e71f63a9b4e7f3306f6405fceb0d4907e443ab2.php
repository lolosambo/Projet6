<?php

/* base.html.twig */
class __TwigTemplate_a148fe2414df4ea3594d3ee4cce9ae63e692e2de73f84f5b82179460d77ded5a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
        <link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" rel=\"stylesheet\"
              integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\"
              crossorigin=\"anonymous\"/>
        <script defer src=\"https://use.fontawesome.com/releases/v5.0.7/js/all.js\"></script>
        ";
        // line 10
        echo "        ";
        // line 11
        echo "        ";
        // line 12
        echo "        ";
        // line 13
        echo "        <link href=\"../css/style.css\" rel=\"stylesheet\" type=\"text/css\" />

        <link href=\"https://fonts.googleapis.com/css?family=Teko:500\" rel=\"stylesheet\" />
        <link href=\"https://fonts.googleapis.com/css?family=Kanit:200|Teko:500\" rel=\"stylesheet\" />
        <link href=\"https://fonts.googleapis.com/css?family=Shadows+Into+Light\" rel=\"stylesheet\">

        <title>";
        // line 19
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    </head>

    <body>

    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"col-lg-12 col-md-12 col-sm-12 header\">
                <div class=\"row\">
                    <div class=\"col-lg-9 col-md-9 col-sm-12 col-12\">
                        <img class=\"img-fluid\" src=\"../images/logo.png\"/><br><br>
                    </div>
                </div>
                <div class=\"row\">
                        ";
        // line 33
        $this->displayBlock('header', $context, $blocks);
        // line 34
        echo "                </div>
            </div>
        </div><br><br>

        <div class=\"row\" id=\"content\">
            <div class=\"col-lg-12 col-md-12 col-sm-12 content\">
                ";
        // line 40
        $this->displayBlock('content', $context, $blocks);
        // line 41
        echo "            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-lg-12 col-md-12 col-sm-12 footer\">

            </div>
        </div>
    </div>

    <script type=\"text/javascript\" src=\"../public/js/jquery.js\"></script>
    <script type=\"text/javascript\" src=\"../public/js/functions.js\"></script>

    </body>
</html>

";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 19
    public function block_title($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo " ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 33
    public function block_header($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        echo "  ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 40
    public function block_content($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  147 => 40,  129 => 33,  111 => 19,  85 => 41,  83 => 40,  75 => 34,  73 => 33,  56 => 19,  48 => 13,  46 => 12,  44 => 11,  42 => 10,  32 => 1,);
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
        {#<link rel=\"stylesheet\" href=\"//fonts.googleapis.com/icon?family=Material+Icons\">#}
        {#<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,400italic,700,700italic' rel='stylesheet' type='text/css'>#}
        {#<link rel=\"stylesheet\" href=\"//storage.googleapis.com/code.getmdl.io/1.0.1/material.teal-red.min.css\" />#}
        {#<script src=\"//storage.googleapis.com/code.getmdl.io/1.0.1/material.min.js\"></script>#}
        <link href=\"../css/style.css\" rel=\"stylesheet\" type=\"text/css\" />

        <link href=\"https://fonts.googleapis.com/css?family=Teko:500\" rel=\"stylesheet\" />
        <link href=\"https://fonts.googleapis.com/css?family=Kanit:200|Teko:500\" rel=\"stylesheet\" />
        <link href=\"https://fonts.googleapis.com/css?family=Shadows+Into+Light\" rel=\"stylesheet\">

        <title>{% block title %} {% endblock %}</title>
    </head>

    <body>

    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"col-lg-12 col-md-12 col-sm-12 header\">
                <div class=\"row\">
                    <div class=\"col-lg-9 col-md-9 col-sm-12 col-12\">
                        <img class=\"img-fluid\" src=\"../images/logo.png\"/><br><br>
                    </div>
                </div>
                <div class=\"row\">
                        {% block header %}  {% endblock %}
                </div>
            </div>
        </div><br><br>

        <div class=\"row\" id=\"content\">
            <div class=\"col-lg-12 col-md-12 col-sm-12 content\">
                {% block content %}{% endblock %}
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col-lg-12 col-md-12 col-sm-12 footer\">

            </div>
        </div>
    </div>

    <script type=\"text/javascript\" src=\"../public/js/jquery.js\"></script>
    <script type=\"text/javascript\" src=\"../public/js/functions.js\"></script>

    </body>
</html>

", "base.html.twig", "/var/www/snowtricks/templates/base.html.twig");
    }
}
