<?php

/* login.html.twig */
class __TwigTemplate_2c1f40345f5b555f2fe1ddfb7b528be78bbd70f8d6207e5998d98c2d9cfe8ca0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "login.html.twig", 1);
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
        echo "Successful registration";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    
    
<h1>Login</h1>

";
        // line 10
        if ((isset($context["loginFailed"]) ? $context["loginFailed"] : null)) {
            // line 11
            echo "    <p>Invalid username or password</p>
";
        }
        // line 13
        echo "
<form method=\"post\">
    Email: <input type=\"text\" name=\"email\"><br>
    Password: <input type=\"password\" name=\"pass\"><br>
    <input type=\"submit\" value=\"Login\">
</form>

<p>If you forgot your password you can <a href=\"/passreset\">reset it</a>.</p>

";
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
        return array (  50 => 13,  46 => 11,  44 => 10,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends \"master.html.twig\" %}

{% block title %}Successful registration{% endblock %}

{% block content %}
    
    
<h1>Login</h1>

{% if loginFailed %}
    <p>Invalid username or password</p>
{% endif %}

<form method=\"post\">
    Email: <input type=\"text\" name=\"email\"><br>
    Password: <input type=\"password\" name=\"pass\"><br>
    <input type=\"submit\" value=\"Login\">
</form>

<p>If you forgot your password you can <a href=\"/passreset\">reset it</a>.</p>

{% endblock %}";
    }
}
