<?php

/* home.html.twig */
class __TwigTemplate_b53a93b12a1c61a45f04c3a1ecec38ac778656cffb4eea5a95b2a2d619141c8b extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "home.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "home.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "home.html.twig"));

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

    // line 5
    public function block_header($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 6
        echo "        <div class=\"col-lg-7 col-md-7 col-sm-12 header-subtitle\">
            Le premier site collaboratif <br>des fans de snowboard<br><br>

        ";
        // line 9
        if ((null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 9, $this->source); })()), "session", array()), "get", array(0 => "pseudo"), "method"))) {
            // line 10
            echo "            <a href=\"/connexion\"><button type=\"button\" class=\"btn btn-lg btn-success\">Se connecter</button></a>
            <a href=\"/inscription\"><button type=\"button\" class=\"btn btn-lg btn-primary\">S'inscrire</button></a>
        ";
        } else {
            // line 13
            echo "            <br><div class=\"container\">
                <img src=\"";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 14, $this->source); })()), "session", array()), "get", array(0 => "avatar"), "method"), "html", null, true);
            echo "\"/> Bonjour ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 14, $this->source); })()), "session", array()), "get", array(0 => "pseudo"), "method"), "html", null, true);
            echo "
            </div>
            <a href=\"/deconnexion\">Se déconnecter</a>
        ";
        }
        // line 18
        echo "        </div>
        <div class=\"row\">
            <div class=\"offset-lg-11 col-lg-1 offset-md-11 col-md-1 offset-sm-11 offset-11 col-sm-1\">
                <div class=\"arrow\">
                    <a href=\"#content\" class=\"scroll\">
                        <i class=\"fas fa-caret-square-down\" style=\"font-size:3em; color: greenyellow;\"
                           title=\"Afficher les figures\"></i>
                    </a>
                </div>
            </div>
        </div>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 31
    public function block_content($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 32
        echo "        ";
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 32, $this->source); })()), "session", array()), "get", array(0 => "pseudo"), "method"))) {
            // line 33
            echo "            <a href=\"/ajouter/figure\"><button class=\"btn btn-success\">Ajouter une Figure</button></a><br><br>
        ";
        }
        // line 35
        echo "        <div class=\"card-deck\">
            <div class=\"row\">
                ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tricks"]) || array_key_exists("tricks", $context) ? $context["tricks"] : (function () { throw new Twig_Error_Runtime('Variable "tricks" does not exist.', 37, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["trick"]) {
            // line 38
            echo "                    <div class=\"col-lg-3 col-md-4 col-sm-6 col-12\">
                        <div class=\"card border-secondary \">
                            ";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["trick"], "images", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["images"]) {
                // line 41
                echo "                                <img class=\"card-img-top\"  src=\"./uploads/";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(twig_get_attribute($this->env, $this->source, $context["images"], "url", array())), "html", null, true);
                echo "\"/>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['images'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "                            ";
            if (twig_test_empty(twig_get_attribute($this->env, $this->source, $context["trick"], "images", array()))) {
                // line 44
                echo "                                <img class=\"card-img-top\" src=\"./images/emptyTrick.png\"/>
                            ";
            }
            // line 46
            echo "                        <div class=\"card-body\">
                            <a href=\"/trick/";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["trick"], "id", array()), "html", null, true);
            echo "\"><h2 class=\"card-title\"><h2>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["trick"], "name", array()), "html", null, true);
            echo " </h2></a>
                                ";
            // line 48
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 48, $this->source); })()), "session", array()), "get", array(0 => "pseudo"), "method") == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trick"], "user", array()), "pseudo", array()))) {
                // line 49
                echo "                                    <a href=\"/modifier/figure/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["trick"], "id", array()), "html", null, true);
                echo "\"><i class=\"fas fa-edit\" style=\"font-size:1.5em; color:Orange\" title=\"Editer la figure\"></i></a>
                                    <a href=\"/supprimer/";
                // line 50
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["trick"], "id", array()), "html", null, true);
                echo "\"><i class=\"fas fa-trash-alt\" style=\"font-size:1.5em; color:SlateGrey\" title=\"Supprimer la figure\"></i></a>
                                ";
            }
            // line 52
            echo "                            <div class=\"badge badge-danger trickBadge\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trick"], "group", array()), "group", array()), "html", null, true);
            echo "</div>
                        </div>
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trick'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "            </div>
        </div><br><br><br>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 57,  187 => 52,  182 => 50,  177 => 49,  175 => 48,  169 => 47,  166 => 46,  162 => 44,  159 => 43,  150 => 41,  146 => 40,  142 => 38,  138 => 37,  134 => 35,  130 => 33,  127 => 32,  118 => 31,  97 => 18,  88 => 14,  85 => 13,  80 => 10,  78 => 9,  73 => 6,  64 => 5,  46 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}

    {% block title %}SNOWTRICKS{% endblock %}

    {% block header %}
        <div class=\"col-lg-7 col-md-7 col-sm-12 header-subtitle\">
            Le premier site collaboratif <br>des fans de snowboard<br><br>

        {% if app.session.get('pseudo') is null %}
            <a href=\"/connexion\"><button type=\"button\" class=\"btn btn-lg btn-success\">Se connecter</button></a>
            <a href=\"/inscription\"><button type=\"button\" class=\"btn btn-lg btn-primary\">S'inscrire</button></a>
        {% else %}
            <br><div class=\"container\">
                <img src=\"{{ app.session.get('avatar')}}\"/> Bonjour {{ app.session.get('pseudo') }}
            </div>
            <a href=\"/deconnexion\">Se déconnecter</a>
        {% endif %}
        </div>
        <div class=\"row\">
            <div class=\"offset-lg-11 col-lg-1 offset-md-11 col-md-1 offset-sm-11 offset-11 col-sm-1\">
                <div class=\"arrow\">
                    <a href=\"#content\" class=\"scroll\">
                        <i class=\"fas fa-caret-square-down\" style=\"font-size:3em; color: greenyellow;\"
                           title=\"Afficher les figures\"></i>
                    </a>
                </div>
            </div>
        </div>
    {% endblock %}

    {% block content %}
        {% if app.session.get('pseudo') is not null %}
            <a href=\"/ajouter/figure\"><button class=\"btn btn-success\">Ajouter une Figure</button></a><br><br>
        {% endif %}
        <div class=\"card-deck\">
            <div class=\"row\">
                {% for trick in tricks %}
                    <div class=\"col-lg-3 col-md-4 col-sm-6 col-12\">
                        <div class=\"card border-secondary \">
                            {% for images in trick.images %}
                                <img class=\"card-img-top\"  src=\"./uploads/{{ asset(images.url) }}\"/>
                            {%  endfor %}
                            {% if trick.images is empty %}
                                <img class=\"card-img-top\" src=\"./images/emptyTrick.png\"/>
                            {% endif %}
                        <div class=\"card-body\">
                            <a href=\"/trick/{{ trick.id }}\"><h2 class=\"card-title\"><h2>{{ trick.name }} </h2></a>
                                {% if app.session.get('pseudo') == trick.user.pseudo %}
                                    <a href=\"/modifier/figure/{{ trick.id }}\"><i class=\"fas fa-edit\" style=\"font-size:1.5em; color:Orange\" title=\"Editer la figure\"></i></a>
                                    <a href=\"/supprimer/{{ trick.id }}\"><i class=\"fas fa-trash-alt\" style=\"font-size:1.5em; color:SlateGrey\" title=\"Supprimer la figure\"></i></a>
                                {% endif %}
                            <div class=\"badge badge-danger trickBadge\">{{ trick.group.group }}</div>
                        </div>
                        </div>
                    </div>
                {% endfor %}
            </div>
        </div><br><br><br>
    {% endblock %}


", "home.html.twig", "/var/www/snowtricks/templates/home.html.twig");
    }
}
