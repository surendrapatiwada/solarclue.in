<?php

/* extension/d_export_import/partials/tabs.twig */
class __TwigTemplate_165e7778cb06227e9465f48c94e5a2b67fe536db08da7a8b4d3c68b95167400b extends Twig_Template
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
        if ((isset($context["notify"]) ? $context["notify"] : null)) {
            // line 2
            echo "<style>
    .notify > a{
        color:inherit;
        padding: 10px;
        margin:-10px;
        display:block;
        font-size: 13px;
        font-weight: 700;
        text-align: center;
    }
</style>
<div class=\"notify alert alert-warning\">";
            // line 13
            echo (isset($context["text_complete_version"]) ? $context["text_complete_version"] : null);
            echo "</div>
";
        }
        // line 15
        echo "<ul class=\"nav nav-tabs\">
    ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tabs"]) ? $context["tabs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["tab"]) {
            // line 17
            echo "        <li class=\"";
            echo (($this->getAttribute($context["tab"], "active", array())) ? ("active") : (""));
            echo "\">
            <a ";
            // line 18
            echo (( !$this->getAttribute($context["tab"], "active", array())) ? ((("href=\"" . $this->getAttribute($context["tab"], "href", array())) . "\"")) : (""));
            echo ">
                <span  class=\"";
            // line 19
            echo $this->getAttribute($context["tab"], "icon", array());
            echo "\"></span> ";
            echo $this->getAttribute($context["tab"], "title", array());
            echo "
            </a>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "</ul>";
    }

    public function getTemplateName()
    {
        return "extension/d_export_import/partials/tabs.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 23,  55 => 19,  51 => 18,  46 => 17,  42 => 16,  39 => 15,  34 => 13,  21 => 2,  19 => 1,);
    }
}
/* {% if notify %}*/
/* <style>*/
/*     .notify > a{*/
/*         color:inherit;*/
/*         padding: 10px;*/
/*         margin:-10px;*/
/*         display:block;*/
/*         font-size: 13px;*/
/*         font-weight: 700;*/
/*         text-align: center;*/
/*     }*/
/* </style>*/
/* <div class="notify alert alert-warning">{{text_complete_version}}</div>*/
/* {% endif %}*/
/* <ul class="nav nav-tabs">*/
/*     {% for tab in tabs %}*/
/*         <li class="{{tab.active?'active'}}">*/
/*             <a {{not tab.active? 'href="'~tab.href~'"'}}>*/
/*                 <span  class="{{tab.icon}}"></span> {{tab.title}}*/
/*             </a>*/
/*         </li>*/
/*     {% endfor %}*/
/* </ul>*/
