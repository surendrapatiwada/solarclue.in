<?php

/* extension/d_export_import/excel.twig */
class __TwigTemplate_e310f00a7290e5b9734d465abeb7d9aa3633ccff2f1a88c239b89ed23c56696e extends Twig_Template
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
        echo (isset($context["header"]) ? $context["header"] : null);
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
<div id=\"content\">
    <div class=\"page-header\">
        <div class=\"container-fluid\">
            <div class=\"form-inline pull-right\">
                <a href=\"";
        // line 6
        echo (isset($context["cancel"]) ? $context["cancel"] : null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo (isset($context["button_cancel"]) ? $context["button_cancel"] : null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a>
            </div>
            <h1>";
        // line 8
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo " ";
        echo (isset($context["version"]) ? $context["version"] : null);
        echo "</h1>
            <ul class=\"breadcrumb\">
                ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "                    <li><a href=\"";
            echo $this->getAttribute($context["breadcrumb"], "href", array());
            echo "\">";
            echo $this->getAttribute($context["breadcrumb"], "text", array());
            echo "</a></li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "            </ul>
        </div>
    </div>
    <div class=\"container-fluid\">
        ";
        // line 17
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "warning", array())) {
            // line 18
            echo "        <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "warning", array());
            echo "
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
        </div>
        ";
        }
        // line 22
        echo "
        ";
        // line 23
        if ($this->getAttribute((isset($context["error"]) ? $context["error"] : null), "success", array())) {
            // line 24
            echo "        <div class=\"alert alert-success\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["success"]) ? $context["success"] : null);
            echo "
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
        </div>
        ";
        }
        // line 28
        echo "        
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 31
        echo (isset($context["text_edit"]) ? $context["text_edit"] : null);
        echo "</h3>
            </div>
            <div class=\"panel-body\">
                <form action=\"";
        // line 34
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-excel\" class=\"form-horizontal\">
                    ";
        // line 35
        echo (isset($context["tabs"]) ? $context["tabs"] : null);
        echo "
                    <div class=\"row\">
                        <div class=\"col-sm-";
        // line 37
        echo (((isset($context["notify"]) ? $context["notify"] : null)) ? ("9") : ("12"));
        echo "\">
                            <div class=\"form-group required\">
                                <label class=\"control-label col-sm-2\">";
        // line 39
        echo (isset($context["entry_language"]) ? $context["entry_language"] : null);
        echo "</label>
                                <div class=\"col-sm-10\">
                                    <select class=\"form-control\" name=\"language_id\">
                                        ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 43
            echo "                                        <option value=\"";
            echo $this->getAttribute($context["language"], "language_id", array());
            echo "\">";
            echo $this->getAttribute($context["language"], "name", array());
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "                                    </select>
                                </div>
                            </div>
                            <input type=\"file\" name=\"import\" style=\"display: none;\" accept=\"application/zip,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet\" />
                            <input type=\"hidden\" name=\"recipient\" value=\"\"/>
                            <table class=\"table table-bordered table-hover\">
                                <thead>
                                    <tr>
                                        <td class=\"text-left\">
                                            ";
        // line 54
        echo (isset($context["column_name"]) ? $context["column_name"] : null);
        echo "
                                        </td>
                                        <td class=\"text-left\">
                                            ";
        // line 57
        echo (isset($context["column_description"]) ? $context["column_description"] : null);
        echo "
                                        </td>
                                        <td class=\"text-center\">
                                            ";
        // line 60
        echo (isset($context["column_action"]) ? $context["column_action"] : null);
        echo "
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    ";
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["modules"]) ? $context["modules"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["module"]) {
            // line 66
            echo "                                    <tr>
                                        <td class=\"text-left\">
                                            ";
            // line 68
            echo $this->getAttribute($context["module"], "title", array());
            echo "
                                        </td>
                                        <td class=\"text-left\">
                                            ";
            // line 71
            echo $this->getAttribute($context["module"], "description", array());
            echo "
                                        </td>
                                        <td class=\"text-center\">
                                            <a id=\"button-export\" class=\"btn btn-success\" data-value=\"";
            // line 74
            echo $context["key"];
            echo "\" data-toggle=\"tooltip\" title=\"";
            echo (isset($context["button_export"]) ? $context["button_export"] : null);
            echo "\"><i class=\"fa fa-download\"></i></a>
                                            <a id=\"button-import\" class=\"btn btn-primary\" data-value=\"";
            // line 75
            echo $context["key"];
            echo "\" data-toggle=\"tooltip\" title=\"";
            echo (isset($context["button_import"]) ? $context["button_import"] : null);
            echo "\"><i class=\"fa fa-upload\"></i></a>
                                            <a id=\"button-setting\" class=\"btn btn-info\" data-value=\"";
            // line 76
            echo $context["key"];
            echo "\" data-toggle=\"tooltip\" title=\"";
            echo (isset($context["button_filter"]) ? $context["button_filter"] : null);
            echo "\"><i class=\"fa fa-filter\"></i></a>
                                        </td>
                                    </tr>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "                                </tbody>
                            </table>
                            <ei_progress_modal></ei_progress_modal>
                            <ei_setting_modal></ei_setting_modal>
                        </div>
                        ";
        // line 85
        if ((isset($context["notify"]) ? $context["notify"] : null)) {
            // line 86
            echo "                        <div class=\"col-sm-3\">
                            <div class=\"d_shopunity_widget_1\"></div>
                        </div>
                        ";
        }
        // line 90
        echo "                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
";
        // line 97
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["riot_tags"]) ? $context["riot_tags"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["riot_tag"]) {
            // line 98
            echo "<script src=\"";
            echo $context["riot_tag"];
            echo "\" type=\"riot/tag\"></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['riot_tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 100
        echo "<script type=\"text/javascript\">

    riot.mixin({ store : d_export_import.createStore(";
        // line 102
        echo twig_jsonencode_filter((isset($context["json"]) ? $context["json"] : null));
        echo ") });

    riot.mount('*');

    \$(document).ready(function () {

        \$(document).on('click', 'a#button-export', function(){
            d_export_import.updateState({mode : 'export', source:\$(this).data('value')});
            d_export_import.initStart();
            d_export_import.export();
            
            \$('#modal-progress').modal({
                backdrop: 'static',
                keyboard: false,
                show:true
            });
        });

        \$(document).on('click', 'a#button-import', function(){
            \$('input[name=recipient]').val(\$(this).data('value'));
            \$('input[type=file][name=import]').val('');
            \$('input[type=file][name=import]').click();
        });

        \$(document).on('click', 'a#button-setting', function(){
            d_export_import.updateState({ 'filter_active' : \$(this).data('value')});

            \$('#modal-setting').modal({
                backdrop: 'static',
                keyboard: false,
                show:true
            });
        });

        \$(\"input:file\").change(function (){
            d_export_import.updateState({mode : 'import', source:\$(this).data('value')});
            d_export_import.initStart();
            d_export_import.import();

            \$('#modal-progress').modal({
                backdrop: 'static',
                keyboard: false,
                show:true
            });
        });
        var d_shopunity_widget_1 = jQuery.extend(true, {}, d_shopunity_widget);
            d_shopunity_widget_1.init({
                class: '.d_shopunity_widget_1',
                token: '";
        // line 150
        echo (isset($context["token"]) ? $context["token"] : null);
        echo "',
                extension_id: '128'
            })
    });
</script>
";
        // line 155
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "extension/d_export_import/excel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  307 => 155,  299 => 150,  248 => 102,  244 => 100,  235 => 98,  231 => 97,  222 => 90,  216 => 86,  214 => 85,  207 => 80,  195 => 76,  189 => 75,  183 => 74,  177 => 71,  171 => 68,  167 => 66,  163 => 65,  155 => 60,  149 => 57,  143 => 54,  132 => 45,  121 => 43,  117 => 42,  111 => 39,  106 => 37,  101 => 35,  97 => 34,  91 => 31,  86 => 28,  78 => 24,  76 => 23,  73 => 22,  65 => 18,  63 => 17,  57 => 13,  46 => 11,  42 => 10,  35 => 8,  28 => 6,  19 => 1,);
    }
}
/* {{header}}{{column_left}}*/
/* <div id="content">*/
/*     <div class="page-header">*/
/*         <div class="container-fluid">*/
/*             <div class="form-inline pull-right">*/
/*                 <a href="{{cancel}}" data-toggle="tooltip" title="{{button_cancel}}" class="btn btn-default"><i class="fa fa-reply"></i></a>*/
/*             </div>*/
/*             <h1>{{heading_title}} {{version}}</h1>*/
/*             <ul class="breadcrumb">*/
/*                 {% for breadcrumb in breadcrumbs %}*/
/*                     <li><a href="{{breadcrumb.href}}">{{breadcrumb.text}}</a></li>*/
/*                 {% endfor %}*/
/*             </ul>*/
/*         </div>*/
/*     </div>*/
/*     <div class="container-fluid">*/
/*         {% if error.warning %}*/
/*         <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> {{error.warning}}*/
/*             <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*         </div>*/
/*         {% endif %}*/
/* */
/*         {% if error.success %}*/
/*         <div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> {{success}}*/
/*             <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*         </div>*/
/*         {% endif %}*/
/*         */
/*         <div class="panel panel-default">*/
/*             <div class="panel-heading">*/
/*                 <h3 class="panel-title"><i class="fa fa-pencil"></i> {{text_edit}}</h3>*/
/*             </div>*/
/*             <div class="panel-body">*/
/*                 <form action="{{action}}" method="post" enctype="multipart/form-data" id="form-excel" class="form-horizontal">*/
/*                     {{tabs}}*/
/*                     <div class="row">*/
/*                         <div class="col-sm-{{notify ? '9' : '12'}}">*/
/*                             <div class="form-group required">*/
/*                                 <label class="control-label col-sm-2">{{entry_language}}</label>*/
/*                                 <div class="col-sm-10">*/
/*                                     <select class="form-control" name="language_id">*/
/*                                         {% for language in languages %}*/
/*                                         <option value="{{language.language_id}}">{{language.name}}</option>*/
/*                                     {% endfor %}*/
/*                                     </select>*/
/*                                 </div>*/
/*                             </div>*/
/*                             <input type="file" name="import" style="display: none;" accept="application/zip,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />*/
/*                             <input type="hidden" name="recipient" value=""/>*/
/*                             <table class="table table-bordered table-hover">*/
/*                                 <thead>*/
/*                                     <tr>*/
/*                                         <td class="text-left">*/
/*                                             {{column_name}}*/
/*                                         </td>*/
/*                                         <td class="text-left">*/
/*                                             {{column_description}}*/
/*                                         </td>*/
/*                                         <td class="text-center">*/
/*                                             {{column_action}}*/
/*                                         </td>*/
/*                                     </tr>*/
/*                                 </thead>*/
/*                                 <tbody>*/
/*                                     {% for key, module in modules %}*/
/*                                     <tr>*/
/*                                         <td class="text-left">*/
/*                                             {{module.title}}*/
/*                                         </td>*/
/*                                         <td class="text-left">*/
/*                                             {{module.description}}*/
/*                                         </td>*/
/*                                         <td class="text-center">*/
/*                                             <a id="button-export" class="btn btn-success" data-value="{{key}}" data-toggle="tooltip" title="{{button_export}}"><i class="fa fa-download"></i></a>*/
/*                                             <a id="button-import" class="btn btn-primary" data-value="{{key}}" data-toggle="tooltip" title="{{button_import}}"><i class="fa fa-upload"></i></a>*/
/*                                             <a id="button-setting" class="btn btn-info" data-value="{{key}}" data-toggle="tooltip" title="{{button_filter}}"><i class="fa fa-filter"></i></a>*/
/*                                         </td>*/
/*                                     </tr>*/
/*                                     {% endfor %}*/
/*                                 </tbody>*/
/*                             </table>*/
/*                             <ei_progress_modal></ei_progress_modal>*/
/*                             <ei_setting_modal></ei_setting_modal>*/
/*                         </div>*/
/*                         {% if notify %}*/
/*                         <div class="col-sm-3">*/
/*                             <div class="d_shopunity_widget_1"></div>*/
/*                         </div>*/
/*                         {% endif %}*/
/*                     </div>*/
/*                     */
/*                 </form>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </div>*/
/* {% for riot_tag in riot_tags %}*/
/* <script src="{{riot_tag}}" type="riot/tag"></script>*/
/* {% endfor %}*/
/* <script type="text/javascript">*/
/* */
/*     riot.mixin({ store : d_export_import.createStore({{json|json_encode}}) });*/
/* */
/*     riot.mount('*');*/
/* */
/*     $(document).ready(function () {*/
/* */
/*         $(document).on('click', 'a#button-export', function(){*/
/*             d_export_import.updateState({mode : 'export', source:$(this).data('value')});*/
/*             d_export_import.initStart();*/
/*             d_export_import.export();*/
/*             */
/*             $('#modal-progress').modal({*/
/*                 backdrop: 'static',*/
/*                 keyboard: false,*/
/*                 show:true*/
/*             });*/
/*         });*/
/* */
/*         $(document).on('click', 'a#button-import', function(){*/
/*             $('input[name=recipient]').val($(this).data('value'));*/
/*             $('input[type=file][name=import]').val('');*/
/*             $('input[type=file][name=import]').click();*/
/*         });*/
/* */
/*         $(document).on('click', 'a#button-setting', function(){*/
/*             d_export_import.updateState({ 'filter_active' : $(this).data('value')});*/
/* */
/*             $('#modal-setting').modal({*/
/*                 backdrop: 'static',*/
/*                 keyboard: false,*/
/*                 show:true*/
/*             });*/
/*         });*/
/* */
/*         $("input:file").change(function (){*/
/*             d_export_import.updateState({mode : 'import', source:$(this).data('value')});*/
/*             d_export_import.initStart();*/
/*             d_export_import.import();*/
/* */
/*             $('#modal-progress').modal({*/
/*                 backdrop: 'static',*/
/*                 keyboard: false,*/
/*                 show:true*/
/*             });*/
/*         });*/
/*         var d_shopunity_widget_1 = jQuery.extend(true, {}, d_shopunity_widget);*/
/*             d_shopunity_widget_1.init({*/
/*                 class: '.d_shopunity_widget_1',*/
/*                 token: '{{token}}',*/
/*                 extension_id: '128'*/
/*             })*/
/*     });*/
/* </script>*/
/* {{footer}}*/
