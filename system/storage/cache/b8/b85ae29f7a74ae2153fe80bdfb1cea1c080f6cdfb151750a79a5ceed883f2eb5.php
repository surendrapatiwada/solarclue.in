<?php

/* default/template/common/header.twig */
class __TwigTemplate_185530478a7477e899f4c60bb98ae0e4d06cc748d20adbb7b0285e0f31ea0724 extends Twig_Template
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
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir=\"";
        // line 3
        echo (isset($context["direction"]) ? $context["direction"] : null);
        echo "\" lang=\"";
        echo (isset($context["lang"]) ? $context["lang"] : null);
        echo "\" class=\"ie8\"><![endif]-->
<!--[if IE 9 ]><html dir=\"";
        // line 4
        echo (isset($context["direction"]) ? $context["direction"] : null);
        echo "\" lang=\"";
        echo (isset($context["lang"]) ? $context["lang"] : null);
        echo "\" class=\"ie9\"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir=\"";
        // line 6
        echo (isset($context["direction"]) ? $context["direction"] : null);
        echo "\" lang=\"";
        echo (isset($context["lang"]) ? $context["lang"] : null);
        echo "\">
<!--<![endif]-->
<head>
<meta charset=\"UTF-8\" />
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
<title>";
        // line 12
        echo (isset($context["title"]) ? $context["title"] : null);
        echo "</title>
<base href=\"";
        // line 13
        echo (isset($context["base"]) ? $context["base"] : null);
        echo "\" />
";
        // line 14
        if ((isset($context["description"]) ? $context["description"] : null)) {
            // line 15
            echo "<meta name=\"description\" content=\"";
            echo (isset($context["description"]) ? $context["description"] : null);
            echo "\" />
";
        }
        // line 17
        if ((isset($context["keywords"]) ? $context["keywords"] : null)) {
            // line 18
            echo "<meta name=\"keywords\" content=\"";
            echo (isset($context["keywords"]) ? $context["keywords"] : null);
            echo "\" />
";
        }
        // line 20
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js\"></script>
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>
<link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\" rel=\"stylesheet\"/>

<!-- <script src=\"catalog/view/javascript/jquery/jquery-2.1.1.min.js\" type=\"text/javascript\"></script>
<link href=\"catalog/view/javascript/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\" />
<script src=\"catalog/view/javascript/bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script> -->
<link href=\"catalog/view/javascript/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"catalog/view/theme/default/stylesheet/stylesheet.css\" rel=\"stylesheet\">
";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["styles"]) ? $context["styles"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
            // line 31
            echo "
<link href=\"";
            // line 32
            echo $this->getAttribute($context["style"], "href", array());
            echo "\" type=\"text/css\" rel=\"";
            echo $this->getAttribute($context["style"], "rel", array());
            echo "\" media=\"";
            echo $this->getAttribute($context["style"], "media", array());
            echo "\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["scripts"]) ? $context["scripts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 35
            echo "<script src=\"";
            echo $context["script"];
            echo "\" type=\"text/javascript\"></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "<script src=\"catalog/view/javascript/common.js\" type=\"text/javascript\"></script>
";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["links"]) ? $context["links"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 39
            echo "<link href=\"";
            echo $this->getAttribute($context["link"], "href", array());
            echo "\" rel=\"";
            echo $this->getAttribute($context["link"], "rel", array());
            echo "\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["analytics"]) ? $context["analytics"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["analytic"]) {
            // line 42
            echo $context["analytic"];
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['analytic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "</head>
<body>
<nav id=\"top\">
  <div class=\"container\">";
        // line 47
        echo (isset($context["currency"]) ? $context["currency"] : null);
        echo "
    ";
        // line 48
        echo (isset($context["language"]) ? $context["language"] : null);
        echo "
    <div id=\"top-links\" class=\"nav pull-right\">
      <ul class=\"list-inline\">
        <li><a href=\"";
        // line 51
        echo (isset($context["contact"]) ? $context["contact"] : null);
        echo "\"><i class=\"fa fa-phone\"></i></a> <span class=\"hidden-xs hidden-sm hidden-md\">";
        echo (isset($context["telephone"]) ? $context["telephone"] : null);
        echo "</span></li>
        <li class=\"dropdown\"><a href=\"";
        // line 52
        echo (isset($context["account"]) ? $context["account"] : null);
        echo "\" title=\"";
        echo (isset($context["text_account"]) ? $context["text_account"] : null);
        echo "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
        echo (isset($context["text_account"]) ? $context["text_account"] : null);
        echo "</span> <span class=\"caret\"></span></a>
          <ul class=\"dropdown-menu dropdown-menu-right\">
            ";
        // line 54
        if ((isset($context["logged"]) ? $context["logged"] : null)) {
            // line 55
            echo "            <li><a href=\"";
            echo (isset($context["account"]) ? $context["account"] : null);
            echo "\">";
            echo (isset($context["text_account"]) ? $context["text_account"] : null);
            echo "</a></li>
            <li><a href=\"";
            // line 56
            echo (isset($context["order"]) ? $context["order"] : null);
            echo "\">";
            echo (isset($context["text_order"]) ? $context["text_order"] : null);
            echo "</a></li>
            <li><a href=\"";
            // line 57
            echo (isset($context["transaction"]) ? $context["transaction"] : null);
            echo "\">";
            echo (isset($context["text_transaction"]) ? $context["text_transaction"] : null);
            echo "</a></li>
            <li><a href=\"";
            // line 58
            echo (isset($context["download"]) ? $context["download"] : null);
            echo "\">";
            echo (isset($context["text_download"]) ? $context["text_download"] : null);
            echo "</a></li>
            <li><a href=\"";
            // line 59
            echo (isset($context["logout"]) ? $context["logout"] : null);
            echo "\">";
            echo (isset($context["text_logout"]) ? $context["text_logout"] : null);
            echo "</a></li>
            ";
        } else {
            // line 61
            echo "\t\t\t<li>
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
            </div>
            <div class=\"modal-body\">
                <div class=\"row\">
                    <div class=\"col-md-8\" style=\"border-right: 1px dotted #C2C2C2;padding-right: 30px;\">
                        <!-- Nav tabs -->
                        <ul class=\"nav nav-tabs\">
                            <li class=\"active\"><a href=\"#Login\" data-toggle=\"tab\">Login</a></li>
                            <li><a href=\"#Registration\" data-toggle=\"tab\">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class=\"tab-content\">
                            <div class=\"tab-pane active\" id=\"Login\">
                                <form role=\"form\" class=\"form-horizontal\">
                                <div class=\"form-group\">
                                    <label for=\"email\" class=\"col-sm-2 control-label\">Email</label>
                                    <div class=\"col-sm-10\">
                                        <input type=\"email\" class=\"form-control\" id=\"email1\" placeholder=\"Email\" />
                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"exampleInputPassword1\" class=\"col-sm-2 control-label\">Password</label>
                                    <div class=\"col-sm-10\">
                                        <input type=\"email\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"Email\" />
                                    </div>
                                </div>
                                <div class=\"row\">
                                    <div class=\"col-sm-2\">
                                    </div>
                                    <div class=\"col-sm-10\">
                                        <button type=\"submit\" class=\"btn btn-primary btn-sm\">Submit</button>
                                        <a href=\"javascript:;\">Forgot your password?</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class=\"tab-pane\" id=\"Registration\">
                                <form role=\"form\" class=\"form-horizontal\">
                                <div class=\"form-group\">
                                    <label for=\"email\" class=\"col-sm-2 control-label\">Name</label>
                                    <div class=\"col-sm-10\">
                                         <input type=\"text\" class=\"form-control\" placeholder=\"Name\" required />
                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"email\" class=\"col-sm-2 control-label\">Email</label>
                                    <div class=\"col-sm-10\">
                                        <input type=\"email\" class=\"form-control\" id=\"email\" placeholder=\"Email\" required />
                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"mobile\" class=\"col-sm-2 control-label\">Mobile</label>
                                    <div class=\"col-sm-10\">
                                        <input type=\"email\" class=\"form-control\" id=\"mobile\" placeholder=\"Mobile\" required />
\t\t\t\t\t\t\t\t\t\t<p id=\"msg\"></p>
                                    </div>
                                </div>
\t\t\t\t\t\t\t\t<div id=\"otpfield\" style=\"display:none\" class=\"form-group\">
\t\t\t\t\t\t\t\t\t<label for=\"mobile\" class=\"col-sm-2 control-label\">OTP</label>
\t\t\t\t\t\t\t\t\t<div class=\"col-sm-10\">
                                        <input type=\"text\" class=\"form-control\" id=\"otp\" placeholder=\"OTP\" required />
\t\t\t\t\t\t\t\t\t\t<p id=\"error\"></p>
                                    </div>
\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div id=\"otpverf\" align=\"center\" style=\"display:none\" class=\"form-group\">
\t\t\t\t\t\t\t\t\t<input type=\"button\" value=\"Verify OTP\" id=\"verf-otp\" class=\"btn\" onclick=\"javascript:validate_otp()\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"otpbutton\" align=\"center\" style=\"display:block\" class=\"form-group\">
\t\t\t\t\t\t\t\t\t<input type=\"button\" value=\"Get OTP\" id=\"button-otp\" class=\"btn\" onclick=\"javascript:generate_otp()\" />
\t\t\t\t\t\t\t\t</div>
                                <div class=\"form-group\">
                                    <label for=\"password\" class=\"col-sm-2 control-label\">Password</label>
                                    <div class=\"col-sm-10\">
                                        <input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Password\" required />
                                    </div>
                                </div>
                                <div class=\"row\">
                                    <div class=\"col-sm-2\">
                                    </div>
                                    <div class=\"col-sm-10\">
                                        <button type=\"button\" class=\"btn btn-primary btn-sm\">Save & Continue</button>
                                        <button type=\"button\" class=\"btn btn-default btn-sm\">Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div id=\"OR\" class=\"hidden-xs\">OR</div>
                    </div>
                    <div class=\"col-md-4\">
                        <div class=\"row text-center sign-with\">
                            <div class=\"col-md-12\">
                                <h3>Sign in with</h3>
                            </div>
                            <div class=\"col-md-12\">
                                <div class=\"btn-group btn-group-justified\">
                                    <a href=\"#\" class=\"btn btn-primary\">Facebook</a> <a href=\"#\" class=\"btn btn-danger\">Google</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
\t\t\t<!--</li> 
            <li><a href=\"";
            // line 171
            echo (isset($context["register"]) ? $context["register"] : null);
            echo "\">";
            echo (isset($context["text_register"]) ? $context["text_register"] : null);
            echo "</a></li>
            <li><a href=\"";
            // line 172
            echo (isset($context["login"]) ? $context["login"] : null);
            echo "\">";
            echo (isset($context["text_login"]) ? $context["text_login"] : null);
            echo "</a></li> -->
            ";
        }
        // line 174
        echo "          </ul>
        </li>
        <li><a href=\"";
        // line 176
        echo (isset($context["wishlist"]) ? $context["wishlist"] : null);
        echo "\" id=\"wishlist-total\" title=\"";
        echo (isset($context["text_wishlist"]) ? $context["text_wishlist"] : null);
        echo "\"><i class=\"fa fa-heart\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
        echo (isset($context["text_wishlist"]) ? $context["text_wishlist"] : null);
        echo "</span></a></li>
        <li><a href=\"";
        // line 177
        echo (isset($context["shopping_cart"]) ? $context["shopping_cart"] : null);
        echo "\" title=\"";
        echo (isset($context["text_shopping_cart"]) ? $context["text_shopping_cart"] : null);
        echo "\"><i class=\"fa fa-shopping-cart\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
        echo (isset($context["text_shopping_cart"]) ? $context["text_shopping_cart"] : null);
        echo "</span></a></li>
        <li><a href=\"";
        // line 178
        echo (isset($context["checkout"]) ? $context["checkout"] : null);
        echo "\" title=\"";
        echo (isset($context["text_checkout"]) ? $context["text_checkout"] : null);
        echo "\"><i class=\"fa fa-share\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
        echo (isset($context["text_checkout"]) ? $context["text_checkout"] : null);
        echo "</span></a></li>
      </ul>
    </div>
  </div>
</nav>
<header>
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col-sm-4\">
        <div id=\"logo\">";
        // line 187
        if ((isset($context["logo"]) ? $context["logo"] : null)) {
            echo "<a href=\"";
            echo (isset($context["home"]) ? $context["home"] : null);
            echo "\"><img src=\"";
            echo (isset($context["logo"]) ? $context["logo"] : null);
            echo "\" title=\"";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "\" alt=\"";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "\" class=\"img-responsive\" /></a>";
        } else {
            // line 188
            echo "          <h1><a href=\"";
            echo (isset($context["home"]) ? $context["home"] : null);
            echo "\">";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "</a></h1>
          ";
        }
        // line 189
        echo "</div>
      </div>
      <div class=\"col-sm-5\">";
        // line 191
        echo (isset($context["search"]) ? $context["search"] : null);
        echo "</div>
      <div class=\"col-sm-3\">";
        // line 192
        echo (isset($context["cart"]) ? $context["cart"] : null);
        echo "</div>
    </div>
  </div>
</header>
";
        // line 196
        echo (isset($context["menu"]) ? $context["menu"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/template/common/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  405 => 196,  398 => 192,  394 => 191,  390 => 189,  382 => 188,  370 => 187,  354 => 178,  346 => 177,  338 => 176,  334 => 174,  327 => 172,  321 => 171,  209 => 61,  202 => 59,  196 => 58,  190 => 57,  184 => 56,  177 => 55,  175 => 54,  166 => 52,  160 => 51,  154 => 48,  150 => 47,  145 => 44,  137 => 42,  133 => 41,  122 => 39,  118 => 38,  115 => 37,  106 => 35,  102 => 34,  90 => 32,  87 => 31,  83 => 30,  71 => 20,  65 => 18,  63 => 17,  57 => 15,  55 => 14,  51 => 13,  47 => 12,  36 => 6,  29 => 4,  23 => 3,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <!--[if IE]><![endif]-->*/
/* <!--[if IE 8 ]><html dir="{{ direction }}" lang="{{ lang }}" class="ie8"><![endif]-->*/
/* <!--[if IE 9 ]><html dir="{{ direction }}" lang="{{ lang }}" class="ie9"><![endif]-->*/
/* <!--[if (gt IE 9)|!(IE)]><!-->*/
/* <html dir="{{ direction }}" lang="{{ lang }}">*/
/* <!--<![endif]-->*/
/* <head>*/
/* <meta charset="UTF-8" />*/
/* <meta name="viewport" content="width=device-width, initial-scale=1">*/
/* <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/* <title>{{ title }}</title>*/
/* <base href="{{ base }}" />*/
/* {% if description %}*/
/* <meta name="description" content="{{ description }}" />*/
/* {% endif %}*/
/* {% if keywords %}*/
/* <meta name="keywords" content="{{ keywords }}" />*/
/* {% endif %}*/
/* <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>*/
/* <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>*/
/* <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>*/
/* */
/* <!-- <script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>*/
/* <link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />*/
/* <script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->*/
/* <link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />*/
/* <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />*/
/* <link href="catalog/view/theme/default/stylesheet/stylesheet.css" rel="stylesheet">*/
/* {% for style in styles %}*/
/* */
/* <link href="{{ style.href }}" type="text/css" rel="{{ style.rel }}" media="{{ style.media }}" />*/
/* {% endfor %}*/
/* {% for script in scripts %}*/
/* <script src="{{ script }}" type="text/javascript"></script>*/
/* {% endfor %}*/
/* <script src="catalog/view/javascript/common.js" type="text/javascript"></script>*/
/* {% for link in links %}*/
/* <link href="{{ link.href }}" rel="{{ link.rel }}" />*/
/* {% endfor %}*/
/* {% for analytic in analytics %}*/
/* {{ analytic }}*/
/* {% endfor %}*/
/* </head>*/
/* <body>*/
/* <nav id="top">*/
/*   <div class="container">{{ currency }}*/
/*     {{ language }}*/
/*     <div id="top-links" class="nav pull-right">*/
/*       <ul class="list-inline">*/
/*         <li><a href="{{ contact }}"><i class="fa fa-phone"></i></a> <span class="hidden-xs hidden-sm hidden-md">{{ telephone }}</span></li>*/
/*         <li class="dropdown"><a href="{{ account }}" title="{{ text_account }}" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="hidden-xs hidden-sm hidden-md">{{ text_account }}</span> <span class="caret"></span></a>*/
/*           <ul class="dropdown-menu dropdown-menu-right">*/
/*             {% if logged %}*/
/*             <li><a href="{{ account }}">{{ text_account }}</a></li>*/
/*             <li><a href="{{ order }}">{{ text_order }}</a></li>*/
/*             <li><a href="{{ transaction }}">{{ text_transaction }}</a></li>*/
/*             <li><a href="{{ download }}">{{ text_download }}</a></li>*/
/*             <li><a href="{{ logout }}">{{ text_logout }}</a></li>*/
/*             {% else %}*/
/* 			<li>*/
/*     <div class="modal-dialog modal-lg">*/
/*         <div class="modal-content">*/
/*             <div class="modal-header">*/
/*                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>*/
/*             </div>*/
/*             <div class="modal-body">*/
/*                 <div class="row">*/
/*                     <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">*/
/*                         <!-- Nav tabs -->*/
/*                         <ul class="nav nav-tabs">*/
/*                             <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>*/
/*                             <li><a href="#Registration" data-toggle="tab">Registration</a></li>*/
/*                         </ul>*/
/*                         <!-- Tab panes -->*/
/*                         <div class="tab-content">*/
/*                             <div class="tab-pane active" id="Login">*/
/*                                 <form role="form" class="form-horizontal">*/
/*                                 <div class="form-group">*/
/*                                     <label for="email" class="col-sm-2 control-label">Email</label>*/
/*                                     <div class="col-sm-10">*/
/*                                         <input type="email" class="form-control" id="email1" placeholder="Email" />*/
/*                                     </div>*/
/*                                 </div>*/
/*                                 <div class="form-group">*/
/*                                     <label for="exampleInputPassword1" class="col-sm-2 control-label">Password</label>*/
/*                                     <div class="col-sm-10">*/
/*                                         <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" />*/
/*                                     </div>*/
/*                                 </div>*/
/*                                 <div class="row">*/
/*                                     <div class="col-sm-2">*/
/*                                     </div>*/
/*                                     <div class="col-sm-10">*/
/*                                         <button type="submit" class="btn btn-primary btn-sm">Submit</button>*/
/*                                         <a href="javascript:;">Forgot your password?</a>*/
/*                                     </div>*/
/*                                 </div>*/
/*                                 </form>*/
/*                             </div>*/
/*                             <div class="tab-pane" id="Registration">*/
/*                                 <form role="form" class="form-horizontal">*/
/*                                 <div class="form-group">*/
/*                                     <label for="email" class="col-sm-2 control-label">Name</label>*/
/*                                     <div class="col-sm-10">*/
/*                                          <input type="text" class="form-control" placeholder="Name" required />*/
/*                                     </div>*/
/*                                 </div>*/
/*                                 <div class="form-group">*/
/*                                     <label for="email" class="col-sm-2 control-label">Email</label>*/
/*                                     <div class="col-sm-10">*/
/*                                         <input type="email" class="form-control" id="email" placeholder="Email" required />*/
/*                                     </div>*/
/*                                 </div>*/
/*                                 <div class="form-group">*/
/*                                     <label for="mobile" class="col-sm-2 control-label">Mobile</label>*/
/*                                     <div class="col-sm-10">*/
/*                                         <input type="email" class="form-control" id="mobile" placeholder="Mobile" required />*/
/* 										<p id="msg"></p>*/
/*                                     </div>*/
/*                                 </div>*/
/* 								<div id="otpfield" style="display:none" class="form-group">*/
/* 									<label for="mobile" class="col-sm-2 control-label">OTP</label>*/
/* 									<div class="col-sm-10">*/
/*                                         <input type="text" class="form-control" id="otp" placeholder="OTP" required />*/
/* 										<p id="error"></p>*/
/*                                     </div>*/
/* 								</div>								*/
/* 								<div id="otpverf" align="center" style="display:none" class="form-group">*/
/* 									<input type="button" value="Verify OTP" id="verf-otp" class="btn" onclick="javascript:validate_otp()" />*/
/* 								</div>*/
/* 								<div id="otpbutton" align="center" style="display:block" class="form-group">*/
/* 									<input type="button" value="Get OTP" id="button-otp" class="btn" onclick="javascript:generate_otp()" />*/
/* 								</div>*/
/*                                 <div class="form-group">*/
/*                                     <label for="password" class="col-sm-2 control-label">Password</label>*/
/*                                     <div class="col-sm-10">*/
/*                                         <input type="password" class="form-control" id="password" placeholder="Password" required />*/
/*                                     </div>*/
/*                                 </div>*/
/*                                 <div class="row">*/
/*                                     <div class="col-sm-2">*/
/*                                     </div>*/
/*                                     <div class="col-sm-10">*/
/*                                         <button type="button" class="btn btn-primary btn-sm">Save & Continue</button>*/
/*                                         <button type="button" class="btn btn-default btn-sm">Cancel</button>*/
/*                                     </div>*/
/*                                 </div>*/
/*                                 </form>*/
/*                             </div>*/
/*                         </div>*/
/*                         <div id="OR" class="hidden-xs">OR</div>*/
/*                     </div>*/
/*                     <div class="col-md-4">*/
/*                         <div class="row text-center sign-with">*/
/*                             <div class="col-md-12">*/
/*                                 <h3>Sign in with</h3>*/
/*                             </div>*/
/*                             <div class="col-md-12">*/
/*                                 <div class="btn-group btn-group-justified">*/
/*                                     <a href="#" class="btn btn-primary">Facebook</a> <a href="#" class="btn btn-danger">Google</a>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div> */
/* 			<!--</li> */
/*             <li><a href="{{ register }}">{{ text_register }}</a></li>*/
/*             <li><a href="{{ login }}">{{ text_login }}</a></li> -->*/
/*             {% endif %}*/
/*           </ul>*/
/*         </li>*/
/*         <li><a href="{{ wishlist }}" id="wishlist-total" title="{{ text_wishlist }}"><i class="fa fa-heart"></i> <span class="hidden-xs hidden-sm hidden-md">{{ text_wishlist }}</span></a></li>*/
/*         <li><a href="{{ shopping_cart }}" title="{{ text_shopping_cart }}"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">{{ text_shopping_cart }}</span></a></li>*/
/*         <li><a href="{{ checkout }}" title="{{ text_checkout }}"><i class="fa fa-share"></i> <span class="hidden-xs hidden-sm hidden-md">{{ text_checkout }}</span></a></li>*/
/*       </ul>*/
/*     </div>*/
/*   </div>*/
/* </nav>*/
/* <header>*/
/*   <div class="container">*/
/*     <div class="row">*/
/*       <div class="col-sm-4">*/
/*         <div id="logo">{% if logo %}<a href="{{ home }}"><img src="{{ logo }}" title="{{ name }}" alt="{{ name }}" class="img-responsive" /></a>{% else %}*/
/*           <h1><a href="{{ home }}">{{ name }}</a></h1>*/
/*           {% endif %}</div>*/
/*       </div>*/
/*       <div class="col-sm-5">{{ search }}</div>*/
/*       <div class="col-sm-3">{{ cart }}</div>*/
/*     </div>*/
/*   </div>*/
/* </header>*/
/* {{ menu }}*/
/* */
