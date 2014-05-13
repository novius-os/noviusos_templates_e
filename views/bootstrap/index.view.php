<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

// Loading configs (see bootstrap.php)

$config = \Nos\Templates\Custom\loadViewConfigCustom();

//\Fuel\Core\Debug::dump($page->template_variation->tpvar_data);


foreach($page->template_variation->tpvar_data as $key => $value)
{

    if($value != "" && $value != null)
    {

        if($key == "_input_hidden_left")
        {
            $tab_temp = explode('||'  , $value);

            foreach($tab_temp as $key => $value)
            {
                $temp_key = str_replace("-" , "." ,$value);
                $temp_key = str_replace(".active" , "" ,$temp_key);
                $tab_temp_value =  explode("-"  ,$value);
                $temp_value = $tab_temp_value[count($tab_temp_value)-2];
                $tab_gauche[$temp_value]=arr::get($config , $temp_key );
            }

            arr::set($config , 'option.side_bar.left_bar',  $tab_gauche);

        }
        else if($key == "_input_hidden_right")
        {
            $tab_temp = explode('||'  , $value);

            foreach($tab_temp as $key => $value)
            {

                $temp_key = str_replace("-" , "." ,$value);
                $temp_key = str_replace(".active" , "" ,$temp_key);
                $tab_temp_value =  explode("-"  ,$value);
                $temp_value = $tab_temp_value[count($tab_temp_value)-2];
                $tab_droite[$temp_value]=arr::get($config , $temp_key );
            }

            arr::set($config , 'option.side_bar.right_bar',  $tab_droite);

        }
        else
        {
            $key =  str_replace("-" , "." ,$key);
            arr::set($config , $key , $value);
        }


    }




}




?>
<!doctype html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <?php

    $tab_skin = array_diff(scandir("static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/css/skin/"), array('..', '.'));

    $str_theme_name = $config["theme_name"];
    $str_skin_name = $config["skin"];
    foreach($tab_skin as $key => $value)
    {
        $chaine = explode(".css", $value);

        if( $chaine[0] == $str_skin_name)
        {
            echo '<link title="'.$chaine[0].'" rel="stylesheet" type="text/css" href="static/apps/noviusos_templates_e/vendor/'.$str_theme_name.'/css/skin/'.$value.'">
             ';
        }
        else
        {
            echo '<link title="'.$chaine[0].'" rel="alternate stylesheet" type="text/css" href="static/apps/noviusos_templates_e/vendor/'.$str_theme_name.'/css/skin/'.$value.'">
             ';
        }
    }

    ?>

    <link rel="stylesheet" href="static/apps/noviusos_templates_e/vendor/<?=$str_theme_name?>/css/social-buttons-3.css">


    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" data-local= "static/apps/noviusos_templates_e/vendor/css/jquery-ui.css"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" data-local= "static/apps/noviusos_templates_e/vendor/<?=$str_theme_name?>/css/font-awesome.css">




    <!-- Fallback Jquery -->
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="static/apps/noviusos_templates_e/vendor/js/jquery.min.j">\x3C/script>')</script>

    <!-- Fallback Jquery UI-->
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript">window.jQuery.ui || document.write('<script src="static/apps/noviusos_templates_e/vendor/js/jquery-ui.min.j">\x3C/script>')</script>

    <!-- Fallback Bootstrap.js-->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script>    $.fn.modal || document.write('<script src="static/apps/noviusos_templates_e/vendor/<?=$str_theme_name?>/js/bootstrap.min.js">\x3C/script>')</script>


    <script src="static/apps/noviusos_templates_e/vendor/<?=$str_theme_name?>/js/less-1.7.0.min.js"></script>
    <script src="static/apps/noviusos_templates_e/vendor/<?=$str_theme_name?>/js/script.<?=$str_theme_name?>.js"></script>
    <script src="static/apps/noviusos_templates_e/vendor/js/script.js"></script>
    <!-- Fallback Css -->
    <!--<script type="text/javascript">

        $(document).ready(function(){
            $.each(document.styleSheets, function(i,sheet){

                var rules = sheet.rules ? sheet.rules : sheet.cssRules;
                if (rules.length == 0) {
                    $('<link rel="stylesheet" type="text/css" href="'+sheet.data-local+'" />').appendTo('head');
                }

            })
        });
    </script>-->



</head>


<body class="background">

<?php
include($config["function_file"]);
?>

       <?php
       if($config["option_bar"] == "y")
       {
           $view = \Nos\FrontCache::viewForgeUncached("noviusos_templates_e::".$str_theme_name."/option_bar" ,array(
                   'sitename'=>$config['option']['title']['title_text'],
                   'link' => $config['option']['title']['url'],
                   'page' => $page,
                   'title' => $title,
                   'wysiwyg' => $wysiwyg,
                   'current_context' => $page->get_context(),
                   'config' => $config,
                   'tab_skin' => $tab_skin,
                   'str_skin_name' => $str_skin_name
               ), false );
       }


       ?>



    <div id="content" class="col-md-12" style="padding: 0">
        <?php
        if($config["option_bar"] == "y"){?>
        <button class="optionbar_button" type="button"><i class="glyphicon glyphicon-align-justify"></i></button>
        <?php }?>
        <div id="content_inner">
            <?php

            $view =  \View::forge("noviusos_templates_e::bootstrap/header",array(
                'sitename'=>$config['option']['title']['title_text'],
                'link' => $config['option']['title']['url'],
                'page' => $page,
                'title' => $title,
                'wysiwyg' => $wysiwyg,
                'current_context' => $page->get_context()
            ), false );
            $view->config = $config;



            echo $view;
            ?>

            <?php
            $view = View::forge("noviusos_templates_e::bootstrap/content"  ,
                array(  'page' => $page,
                    'title' => $title,
                    'wysiwyg' => $wysiwyg,
                ), false);
            $view->config = $config;
            $view->jumbotron = $jumbotron;
            echo $view;
            ?>

            <?php $view = View::forge("noviusos_templates_e::bootstrap/footer", array(  'page' => $page,
                'title' => $title,
                'wysiwyg' => $wysiwyg,
            ), false);
            $view->config = $config;
            echo $view;?>


        </div>
    </div>

</div>


</body>
</html>
