<?php

/* home.twig */
class __TwigTemplate_639c2ff99983ce49161cefd446c3d8e1793714d2c0e06c5d492bc2b7ef4cd986 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <body>
        <h1>";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h1>
        <p>";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true);
        echo "</p>
        <hr>
        <ul>
            ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 9
            echo "                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "url", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "title", array()), "html", null, true);
            echo "</a></li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "        </ul>
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 11,  38 => 9,  34 => 8,  28 => 5,  24 => 4,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <body>*/
/*         <h1>{{ title }}</h1>*/
/*         <p>{{ content }}</p>*/
/*         <hr>*/
/*         <ul>*/
/*             {% for post in posts %}*/
/*                 <li><a href="{{ post.url }}">{{ post.title }}</a></li>*/
/*             {% endfor %}*/
/*         </ul>*/
/*     </body>*/
/* </html>*/
