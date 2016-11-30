<?php

/* master.html.twig */
class __TwigTemplate_00bcda08eee2c84502e92889646aad07f86151fb25d8b87b432d53a55d427275 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <link rel=\"stylesheet\" href=\"styles/styles.css\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>
        ";
        // line 8
        $this->displayBlock('head', $context, $blocks);
        // line 10
        echo "    </head>
    <body>
        <div id=\"centerContent\">
            <ul>
                <li><a href=\"/viewAirport\">Airports</a></li>
                 <li><a href=\"/viewFlights\">Flights</a></li>
                  <li><a href=\"/viewTrips\">Trips</a></li>
            </ul>
            
            <div id=\"content\">";
        // line 19
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
            <div id=\"footer\">                
                    &copy; Copyright 2016 by <a href=\"http://domain.invalid/\">Behnaz</a>.
            </div>
        </div>
       
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
    }

    // line 8
    public function block_head($context, array $blocks = array())
    {
        // line 9
        echo "        ";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "master.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  72 => 19,  68 => 9,  65 => 8,  60 => 5,  47 => 19,  36 => 10,  34 => 8,  28 => 5,  22 => 1,);
    }

    public function getSource()
    {
        return "<!DOCTYPE html>
<html>
    <head>
        <link rel=\"stylesheet\" href=\"styles/styles.css\" />
        <title>{% block title %}{% endblock %}</title>
        
        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js\"></script>
        {% block head %}
        {% endblock %}
    </head>
    <body>
        <div id=\"centerContent\">
            <ul>
                <li><a href=\"/viewAirport\">Airports</a></li>
                 <li><a href=\"/viewFlights\">Flights</a></li>
                  <li><a href=\"/viewTrips\">Trips</a></li>
            </ul>
            
            <div id=\"content\">{% block content %}{% endblock %}</div>
            <div id=\"footer\">                
                    &copy; Copyright 2016 by <a href=\"http://domain.invalid/\">Behnaz</a>.
            </div>
        </div>
       
    </body>
</html>
";
    }
}
