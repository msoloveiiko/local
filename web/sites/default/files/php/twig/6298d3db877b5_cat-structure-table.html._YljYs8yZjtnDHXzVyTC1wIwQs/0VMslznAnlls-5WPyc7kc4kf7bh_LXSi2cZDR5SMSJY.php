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
        echo "<div class=\"cat-fields\">
  ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 3
            echo "    <div class=\"bonnie-item\">
      <div class=\"image_wrapper\">
        <a class=\"img_link\" href =\"";
            // line 5
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_photo", [], "any", false, false, true, 5), 5, $this->source), "html", null, true);
            echo "\">
          <img src=\"";
            // line 6
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_photo", [], "any", false, false, true, 6), 6, $this->source), "html", null, true);
            echo "\" alt=\"cats photo\">
        </a>
      </div>
      <div class=\"information-item\">
        <div class=\"item cat_name\">";
            // line 10
            echo t("Cat name: &nbsp", array());
            echo "<span data-itemId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
            echo "\" class=\"your-cat-name\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_name", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
            echo "</span></div>
        <div class=\"item your_email\" data-itemId=\"";
            // line 11
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
            echo "\">";
            echo t("Your email:", array());
            // line 12
            echo "          <a href=\"mailto:";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "your_email", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
            echo "\" class=\"your-email-link\" data-itemId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
            echo "\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "your_email", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
            echo "</a>
        </div>
        <div class=\"item date\">";
            // line 14
            echo t("Date added: &nbsp", array());
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
            echo "</div>
        ";
            // line 15
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "Delete and edit cat field"], "method", false, false, true, 15)) {
                // line 16
                echo "          <div class=\"cat-settings\">
            <button class=\"cat-edit\" data-itemId=\"";
                // line 17
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
                echo "\">Edit</button>
            <button class=\"cat-delete\" data-itemId=\"";
                // line 18
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
                echo "\">Delete</button>
          </div>
        ";
            }
            // line 21
            echo "      </div>
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "</div>
";
        // line 25
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteBonnieForm"] ?? null), 25, $this->source), "html", null, true);
        echo "
";
        // line 26
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["EditForm"] ?? null), 26, $this->source), "html", null, true);
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
        return array (  118 => 26,  114 => 25,  111 => 24,  103 => 21,  97 => 18,  93 => 17,  90 => 16,  88 => 15,  83 => 14,  73 => 12,  69 => 11,  61 => 10,  54 => 6,  50 => 5,  46 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/bonnie/templates/cat-structure-table.html.twig", "/var/www/web/modules/custom/bonnie/templates/cat-structure-table.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 2, "trans" => 10, "if" => 15);
        static $filters = array("escape" => 5);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for', 'trans', 'if'],
                ['escape'],
                []
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
