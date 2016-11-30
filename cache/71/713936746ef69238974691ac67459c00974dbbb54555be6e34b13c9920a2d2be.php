<?php

/* airport.html.twig */
class __TwigTemplate_0ac52ea065de50c6922ead812059bc01ce0e1c1cf217a0c5eea3baaeb9b410d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("master.html.twig", "airport.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
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
        echo "TripAdvise-Airprts";
    }

    // line 6
    public function block_head($context, array $blocks = array())
    {
        // line 7
        echo "    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
    <script>
         function showCity() {

            \$.ajax({
                url: \"/city\",
               

                statusCode: {
                    401: function (xhr) {
                        
                    }
                },
                type: \"GET\",
                dataType: \"json\"
            }).done(function (data) {
                
                var opts = \"\";
                for (var i = 0; i < data.length; i++) {
                    opts += '<option value=\"' + data[i].city+'-'+data[i].country+ '\">' + data[i].city+'-'+data[i].country + '</option>';
                }
                \$(\"#city\").html(opts);
                \$(\"#city\").val(1);
                
            });

        }
        \$(document).ready(function () {

                  showCity();
            
        });
        </script>
        ";
    }

    // line 41
    public function block_content($context, array $blocks = array())
    {
        // line 42
        echo "
    <h1>Welcome to TripAdvisor</h1>

    ";
        // line 45
        if ((isset($context["sessionUser"]) ? $context["sessionUser"] : null)) {
            // line 46
            echo "        <p>Hello ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sessionUser"]) ? $context["sessionUser"] : null), "name", array()), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sessionUser"]) ? $context["sessionUser"] : null), "email", array()), "html", null, true);
            echo ").
            You may <a href=\"/logout\">logout</a>.</p>
        ";
        } else {
            // line 49
            echo "        <p>You may <a href=\"/login\">login</a> or <a href=\"/register\">register</a>.</p>
    ";
        }
        // line 51
        echo "<div>
    <table>
        <th><td>Airport</td><td>city</td></th>
    ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["airportList"]) ? $context["airportList"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["airport"]) {
            // line 55
            echo "        <tr>      
            
            <td>";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($context["airport"], "name", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["airport"], "code", array()), "html", null, true);
            echo "</td>            
            <td>";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($context["airport"], "city", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["airport"], "country", array()), "html", null, true);
            echo "</td>
            
        </tr>
       
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['airport'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "      </table>
    
     </div>
       ";
        // line 66
        if ((isset($context["sessionUser"]) ? $context["sessionUser"] : null)) {
            // line 67
            echo "            <form method=\"POST\" action=\"/addAirport\">
                Add new Air port
                Airport Name:<input type=\"text\" name=\"name\" >
                Airport Code:<input type=\"text\" name=\"code\" >
                City:<select id=\"city\" name=\"city\">                
                </select>
                <input type=\"submit\" value=\"Add airport\">
            </form>
       ";
        }
        // line 76
        echo "
";
    }

    public function getTemplateName()
    {
        return "airport.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 76,  138 => 67,  136 => 66,  131 => 63,  118 => 58,  112 => 57,  108 => 55,  104 => 54,  99 => 51,  95 => 49,  86 => 46,  84 => 45,  79 => 42,  76 => 41,  39 => 7,  36 => 6,  30 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends \"master.html.twig\" %}

{% block title %}TripAdvise-Airprts{% endblock %}


{% block head %}
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
    <script>
         function showCity() {

            \$.ajax({
                url: \"/city\",
               

                statusCode: {
                    401: function (xhr) {
                        
                    }
                },
                type: \"GET\",
                dataType: \"json\"
            }).done(function (data) {
                
                var opts = \"\";
                for (var i = 0; i < data.length; i++) {
                    opts += '<option value=\"' + data[i].city+'-'+data[i].country+ '\">' + data[i].city+'-'+data[i].country + '</option>';
                }
                \$(\"#city\").html(opts);
                \$(\"#city\").val(1);
                
            });

        }
        \$(document).ready(function () {

                  showCity();
            
        });
        </script>
        {% endblock %}
{% block content %}

    <h1>Welcome to TripAdvisor</h1>

    {% if sessionUser %}
        <p>Hello {{sessionUser.name}} ({{sessionUser.email}}).
            You may <a href=\"/logout\">logout</a>.</p>
        {% else %}
        <p>You may <a href=\"/login\">login</a> or <a href=\"/register\">register</a>.</p>
    {% endif %}
<div>
    <table>
        <th><td>Airport</td><td>city</td></th>
    {% for airport in airportList %}
        <tr>      
            
            <td>{{airport.name}}-{{airport.code}}</td>            
            <td>{{airport.city}}-{{airport.country}}</td>
            
        </tr>
       
    {% endfor %}
      </table>
    
     </div>
       {% if sessionUser %}
            <form method=\"POST\" action=\"/addAirport\">
                Add new Air port
                Airport Name:<input type=\"text\" name=\"name\" >
                Airport Code:<input type=\"text\" name=\"code\" >
                City:<select id=\"city\" name=\"city\">                
                </select>
                <input type=\"submit\" value=\"Add airport\">
            </form>
       {% endif %}

{% endblock %}

";
    }
}
