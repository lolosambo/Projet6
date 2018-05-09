<?php

/* comments.html.twig */
class __TwigTemplate_ab05c97cd47846c94bc9f6551ae8ddf2a1c334c5de2ee4478dff725b005a1a06 extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "comments.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "comments.html.twig"));

        // line 1
        echo "
";
        // line 2
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 2, $this->source); })()), "session", array()), "get", array(0 => "userId"), "method"))) {
            // line 3
            echo "
    ";
            // line 4
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["addCommentForm"]) || array_key_exists("addCommentForm", $context) ? $context["addCommentForm"] : (function () { throw new Twig_Error_Runtime('Variable "addCommentForm" does not exist.', 4, $this->source); })()), 'form_start');
            echo "
    ";
            // line 5
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["addCommentForm"]) || array_key_exists("addCommentForm", $context) ? $context["addCommentForm"] : (function () { throw new Twig_Error_Runtime('Variable "addCommentForm" does not exist.', 5, $this->source); })()), 'widget');
            echo "<br>
        <button type=\"submit\" name=\"Comment\" class=\"btn btn-success btn-sm\">Commenter</button>
        <button type=\"reset\" name=\"reset\" class=\"btn btn-default btn-sm\">Effacer</button><br><br>
    ";
            // line 8
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["addCommentForm"]) || array_key_exists("addCommentForm", $context) ? $context["addCommentForm"] : (function () { throw new Twig_Error_Runtime('Variable "addCommentForm" does not exist.', 8, $this->source); })()), 'form_end');
            echo "


";
        }
        // line 12
        echo "
";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new Twig_Error_Runtime('Variable "comments" does not exist.', 13, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 14
            echo "    <div class=\"row comments\">
        <div class=\"col-md-1\">
            <img src=\"";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "user", array()), "avatar", array()), "html", null, true);
            echo "\"/><br>
            ";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["comment"], "user", array()), "pseudo", array()), "html", null, true);
            echo "
        </div>
        <div class=\"col-md-11\">
            ";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "content", array()), "html", null, true);
            echo "<br>
            <em>écrit le ";
            // line 21
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "commentDate", array()), "d/m/Y \\à H\\hi"), "html", null, true);
            echo "</em>
        </div>
    </div><br>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "<br><br>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "comments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 25,  79 => 21,  75 => 20,  69 => 17,  65 => 16,  61 => 14,  57 => 13,  54 => 12,  47 => 8,  41 => 5,  37 => 4,  34 => 3,  32 => 2,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% if app.session.get('userId') is not null %}

    {{ form_start(addCommentForm) }}
    {{ form_widget(addCommentForm) }}<br>
        <button type=\"submit\" name=\"Comment\" class=\"btn btn-success btn-sm\">Commenter</button>
        <button type=\"reset\" name=\"reset\" class=\"btn btn-default btn-sm\">Effacer</button><br><br>
    {{ form_end(addCommentForm) }}


{% endif %}

{% for comment in comments %}
    <div class=\"row comments\">
        <div class=\"col-md-1\">
            <img src=\"{{ comment.user.avatar }}\"/><br>
            {{ comment.user.pseudo }}
        </div>
        <div class=\"col-md-11\">
            {{ comment.content }}<br>
            <em>écrit le {{ comment.commentDate | date ('d/m/Y \\\\à H\\\\hi')}}</em>
        </div>
    </div><br>
{% endfor %}
<br><br>", "comments.html.twig", "/var/www/snowtricks/templates/comments.html.twig");
    }
}
