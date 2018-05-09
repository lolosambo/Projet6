<?php

/* oneTrick.html.twig */
class __TwigTemplate_2844e50a93442e8fee47b61908055c34f53961dbdc81c3ff929654f048c27b64 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "oneTrick.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "oneTrick.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "oneTrick.html.twig"));

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

        echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new Twig_Error_Runtime('Variable "trick" does not exist.', 3, $this->source); })()), "name", array())), "html", null, true);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 6
        echo "        <div class=\"row\">
            ";
        // line 7
        if (twig_get_attribute($this->env, $this->source, ($context["aLaUne"] ?? null), "url", array(), "any", true, true)) {
            // line 8
            echo "                <div class=\"offset-md-1 col-md-10 col-sm-12 aLaUne\" style=\"background-image: url('../uploads/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["aLaUne"]) || array_key_exists("aLaUne", $context) ? $context["aLaUne"] : (function () { throw new Twig_Error_Runtime('Variable "aLaUne" does not exist.', 8, $this->source); })()), "url", array()), "html", null, true);
            echo "');\">
            ";
        } else {
            // line 10
            echo "                <div class=\"offset-md-1 col-md-10 col-sm-12 aLaUne\" style=\"background-image: url('../images/empty_alaune.png'); background-size: contain;\">
            ";
        }
        // line 12
        echo "                <a href=\"/image_a_la_une/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new Twig_Error_Runtime('Variable "trick" does not exist.', 12, $this->source); })()), "id", array()), "html", null, true);
        echo "\"><button type=\"submit\" class=\"btn btn-success\">Changer l'image</button></a>
            </div>
        </div>
        <div class=\"row\">
            ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["images"]) || array_key_exists("images", $context) ? $context["images"] : (function () { throw new Twig_Error_Runtime('Variable "images" does not exist.', 16, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 17
            echo "                <div class=\"col-lg-2 col-md-4 col-sm-12\">
                    <img class=\"img-thumbnail\" style=\"margin-bottom:20px;\" src=\"../uploads/";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["image"], "url", array()), "html", null, true);
            echo "\"/>
                         ";
            // line 19
            if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 19, $this->source); })()), "session", array()), "get", array(0 => "pseudo"), "method"))) {
                // line 20
                echo "                             <a href=\"/supprimer/trick/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new Twig_Error_Runtime('Variable "trick" does not exist.', 20, $this->source); })()), "id", array()), "html", null, true);
                echo "/images/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["image"], "id", array()), "html", null, true);
                echo "\"><i class=\"fas fa-trash-alt\" style=\"font-size:1.5em; color:SlateGrey\" title=\"Supprimer l'image\"></i></a>
                         ";
            }
            // line 22
            echo "                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "
            ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["videos"]) || array_key_exists("videos", $context) ? $context["videos"] : (function () { throw new Twig_Error_Runtime('Variable "videos" does not exist.', 25, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
            // line 26
            echo "                <div class=\"col-lg-2 col-md-4 col-sm-12\">
                    <div class=\"embed-responsive embed-responsive-16by9\" style=\"margin-bottom:20px;\">
                        <iframe class=\"embed-responsive-item\" src=\"";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["video"], "url", array()), "html", null, true);
            echo "\" allowfullscreen> </iframe>
                    </div>
                    ";
            // line 30
            if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 30, $this->source); })()), "session", array()), "get", array(0 => "pseudo"), "method"))) {
                // line 31
                echo "                        <a href=\"/supprimer/trick/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new Twig_Error_Runtime('Variable "trick" does not exist.', 31, $this->source); })()), "id", array()), "html", null, true);
                echo "/videos/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["video"], "id", array()), "html", null, true);
                echo "\"><i class=\"fas fa-trash-alt\" style=\"font-size:1.5em; color:SlateGrey\" title=\"Supprimer la video\"></i></a>
                    ";
            }
            // line 33
            echo "                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "        </div><br><br>

        <div class=\"row\">
            <h1>";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new Twig_Error_Runtime('Variable "trick" does not exist.', 38, $this->source); })()), "name", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new Twig_Error_Runtime('Variable "trick" does not exist.', 38, $this->source); })()), "group", array()), "group", array()), "html", null, true);
        echo ")</h1>
            <p>";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new Twig_Error_Runtime('Variable "trick" does not exist.', 39, $this->source); })()), "content", array()), "html", null, true);
        echo "</p>
            <em>Proposé par ";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new Twig_Error_Runtime('Variable "trick" does not exist.', 40, $this->source); })()), "user", array()), "pseudo", array()), "html", null, true);
        echo " - Le ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new Twig_Error_Runtime('Variable "trick" does not exist.', 40, $this->source); })()), "trickDate", array()), "d/m/Y \\à H\\hi"), "html", null, true);
        echo "</em><br><br>
        </div>

        ";
        // line 43
        $this->loadTemplate("comments.html.twig", "oneTrick.html.twig", 43)->display($context);
        // line 44
        echo "
        <a href=\"/\"><button type=\"button\" class=\"btn btn-primary\">Retour à la page d'accueil</button></a><br><br><br>

    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "oneTrick.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 44,  179 => 43,  171 => 40,  167 => 39,  161 => 38,  156 => 35,  149 => 33,  141 => 31,  139 => 30,  134 => 28,  130 => 26,  126 => 25,  123 => 24,  116 => 22,  108 => 20,  106 => 19,  102 => 18,  99 => 17,  95 => 16,  87 => 12,  83 => 10,  77 => 8,  75 => 7,  72 => 6,  63 => 5,  45 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

    {% block title %}{{ trick.name | upper }}{% endblock %}

    {% block content %}
        <div class=\"row\">
            {% if aLaUne.url is defined %}
                <div class=\"offset-md-1 col-md-10 col-sm-12 aLaUne\" style=\"background-image: url('../uploads/{{ aLaUne.url }}');\">
            {% else %}
                <div class=\"offset-md-1 col-md-10 col-sm-12 aLaUne\" style=\"background-image: url('../images/empty_alaune.png'); background-size: contain;\">
            {% endif %}
                <a href=\"/image_a_la_une/{{ trick.id }}\"><button type=\"submit\" class=\"btn btn-success\">Changer l'image</button></a>
            </div>
        </div>
        <div class=\"row\">
            {% for image in images %}
                <div class=\"col-lg-2 col-md-4 col-sm-12\">
                    <img class=\"img-thumbnail\" style=\"margin-bottom:20px;\" src=\"../uploads/{{ image.url }}\"/>
                         {% if app.session.get('pseudo') is not null %}
                             <a href=\"/supprimer/trick/{{ trick.id }}/images/{{ image.id }}\"><i class=\"fas fa-trash-alt\" style=\"font-size:1.5em; color:SlateGrey\" title=\"Supprimer l'image\"></i></a>
                         {% endif %}
                </div>
            {% endfor %}

            {% for video in videos %}
                <div class=\"col-lg-2 col-md-4 col-sm-12\">
                    <div class=\"embed-responsive embed-responsive-16by9\" style=\"margin-bottom:20px;\">
                        <iframe class=\"embed-responsive-item\" src=\"{{ video.url }}\" allowfullscreen> </iframe>
                    </div>
                    {% if app.session.get('pseudo') is not null %}
                        <a href=\"/supprimer/trick/{{ trick.id }}/videos/{{ video.id }}\"><i class=\"fas fa-trash-alt\" style=\"font-size:1.5em; color:SlateGrey\" title=\"Supprimer la video\"></i></a>
                    {% endif %}
                </div>
            {% endfor %}
        </div><br><br>

        <div class=\"row\">
            <h1>{{ trick.name }} ({{ trick.group.group }})</h1>
            <p>{{ trick.content }}</p>
            <em>Proposé par {{ trick.user.pseudo }} - Le {{ trick.trickDate | date ('d/m/Y \\\\à H\\\\hi') }}</em><br><br>
        </div>

        {% include 'comments.html.twig' %}

        <a href=\"/\"><button type=\"button\" class=\"btn btn-primary\">Retour à la page d'accueil</button></a><br><br><br>

    {% endblock %}

", "oneTrick.html.twig", "/var/www/snowtricks/templates/oneTrick.html.twig");
    }
}
