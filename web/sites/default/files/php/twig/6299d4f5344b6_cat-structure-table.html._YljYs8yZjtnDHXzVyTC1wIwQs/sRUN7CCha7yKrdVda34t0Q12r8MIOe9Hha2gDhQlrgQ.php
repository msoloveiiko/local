<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/bonnie/templates/cat-structure-table.html.twig */
class __TwigTemplate_27daea3b9c1b6662df89ca3f2fb4becdaafc1cb0812c39d0bdd8b12ca6390096 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "Settings on cats list"], "method", false, false, true, 1)) {
            // line 2
            echo "<button class=\"delete-checkbox-cats\">Delete the check mark</button>
<button class=\"delete-all-cats\">Delete all</button>
";
        }
        // line 5
        echo "<div class=\"cat-fields\">
  ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 7
            echo "    <div class=\"bonnie-item\">
      <input data-itemId=\"";
            // line 8
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "\" class=\"check-item\" type=\"checkbox\">
      <div class=\"image_wrapper\">
        <a class=\"img_link\" href =\"";
            // line 10
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_photo", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
            echo "\">
          <img src=\"";
            // line 11
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_photo", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
            echo "\" alt=\"cats photo\">
        </a>
      </div>
      <div class=\"information-item\">
        <div class=\"item cat_name\">";
            // line 15
            echo t("Cat name: &nbsp", array());
            echo "<span data-itemId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "\" class=\"your-cat-name\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_name", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "</span></div>
        <div class=\"item your_email\" data-itemId=\"";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
            echo "\">";
            echo t("Your email:", array());
            // line 17
            echo "          <a href=\"mailto:";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "your_email", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
            echo "\" class=\"your-email-link\" data-itemId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "your_email", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
            echo "</a>
        </div>
        <div class=\"item date\">";
            // line 19
            echo t("Date added: &nbsp", array());
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
            echo "</div>
        ";
            // line 20
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "Delete and edit cat field"], "method", false, false, true, 20)) {
                // line 21
                echo "          <div class=\"cat-settings\">
            <button class=\"cat-edit\" data-itemId=\"";
                // line 22
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
                echo "\">Edit</button>
            <button class=\"cat-delete\" data-itemId=\"";
                // line 23
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
                echo "\">Delete</button>
          </div>
        ";
            }
            // line 26
            echo "      </div>
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "</div>
";
        // line 30
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteBonnieForm"] ?? null), 30, $this->source), "html", null, true);
        echo "
";
        // line 31
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["EditForm"] ?? null), 31, $this->source), "html", null, true);
        echo "
";
        // line 32
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteAllBonnieForm"] ?? null), 32, $this->source), "html", null, true);
        echo "
";
        // line 33
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteCheckbox"] ?? null), 33, $this->source), "html", null, true);
        echo "

";
        // line 35
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bonnie/glodal"), "html", null, true);
        echo "
";
        // line 36
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bonnie/cat-structure"), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/custom/bonnie/templates/cat-structure-table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 36,  142 => 35,  137 => 33,  133 => 32,  129 => 31,  125 => 30,  122 => 29,  114 => 26,  108 => 23,  104 => 22,  101 => 21,  99 => 20,  94 => 19,  84 => 17,  80 => 16,  72 => 15,  65 => 11,  61 => 10,  56 => 8,  53 => 7,  49 => 6,  46 => 5,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/bonnie/templates/cat-structure-table.html.twig", "/var/www/web/modules/custom/bonnie/templates/cat-structure-table.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1, "for" => 6, "trans" => 15);
        static $filters = array("escape" => 8);
        static $functions = array("attach_library" => 35);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'trans'],
                ['escape'],
                ['attach_library']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
