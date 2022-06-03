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
        echo "<button class=\"delete-checkbox-cats\">Delete the check mark</button>
<button class=\"delete-all-cats\">Delete all</button>
<div class=\"cat-fields\">
  ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 5
            echo "    <div class=\"bonnie-item\">
      <input data-itemId=\"";
            // line 6
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 6), 6, $this->source), "html", null, true);
            echo "\" class=\"check-item\" type=\"checkbox\">
      <div class=\"image_wrapper\">
        <a class=\"img_link\" href =\"";
            // line 8
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_photo", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "\">
          <img src=\"";
            // line 9
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_photo", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
            echo "\" alt=\"cats photo\">
        </a>
      </div>
      <div class=\"information-item\">
        <div class=\"item cat_name\">";
            // line 13
            echo t("Cat name: &nbsp", array());
            echo "<span data-itemId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
            echo "\" class=\"your-cat-name\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_name", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
            echo "</span></div>
        <div class=\"item your_email\" data-itemId=\"";
            // line 14
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
            echo "\">";
            echo t("Your email:", array());
            // line 15
            echo "          <a href=\"mailto:";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "your_email", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "\" class=\"your-email-link\" data-itemId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "your_email", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "</a>
        </div>
        <div class=\"item date\">";
            // line 17
            echo t("Date added: &nbsp", array());
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
            echo "</div>
        ";
            // line 18
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "Delete and edit cat field"], "method", false, false, true, 18)) {
                // line 19
                echo "          <div class=\"cat-settings\">
            <button class=\"cat-edit\" data-itemId=\"";
                // line 20
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
                echo "\">Edit</button>
            <button class=\"cat-delete\" data-itemId=\"";
                // line 21
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
                echo "\">Delete</button>
          </div>
        ";
            }
            // line 24
            echo "      </div>
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "</div>
";
        // line 28
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteBonnieForm"] ?? null), 28, $this->source), "html", null, true);
        echo "
";
        // line 29
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["EditForm"] ?? null), 29, $this->source), "html", null, true);
        echo "
";
        // line 30
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteAllBonnieForm"] ?? null), 30, $this->source), "html", null, true);
        echo "
";
        // line 31
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteCheckbox"] ?? null), 31, $this->source), "html", null, true);
        echo "

";
        // line 33
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bonnie/glodal"), "html", null, true);
        echo "
";
        // line 34
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
        return array (  141 => 34,  137 => 33,  132 => 31,  128 => 30,  124 => 29,  120 => 28,  117 => 27,  109 => 24,  103 => 21,  99 => 20,  96 => 19,  94 => 18,  89 => 17,  79 => 15,  75 => 14,  67 => 13,  60 => 9,  56 => 8,  51 => 6,  48 => 5,  44 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/bonnie/templates/cat-structure-table.html.twig", "/var/www/web/modules/custom/bonnie/templates/cat-structure-table.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 4, "trans" => 13, "if" => 18);
        static $filters = array("escape" => 6);
        static $functions = array("attach_library" => 33);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'trans', 'if'],
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
