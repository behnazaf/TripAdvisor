<?php

/* error_internal.html.twig */
class __TwigTemplate_4dbe3465737f7c363eed7f3d46c988b3ea5411bfa2dd8fb66801c7c7fbd0ef5a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "error_internal.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "master.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Internal error";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Internal error</h1>
    
    <p>We're very sorry, we failed to fulfill your request.
        Our team of coding black ninjas has already
        been notified of your trouble.</p>
    <p><a href=\"/\">Click here</a> to continue</p>
    
    
";
    }

    public function getTemplateName()
    {
        return "error_internal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends \"master.html.twig\" %}

{% block title %}Internal error{% endblock %}

{% block content %}
    <h1>Internal error</h1>
    
    <p>We're very sorry, we failed to fulfill your request.
        Our team of coding black ninjas has already
        been notified of your trouble.</p>
    <p><a href=\"/\">Click here</a> to continue</p>
    
    
{% endblock %}";
    }
}
