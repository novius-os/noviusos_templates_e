<?php
/**
 * Created by PhpStorm.
 * User: dahan
 * Date: 21/03/14
 * Time: 16:52
 */

define('NOS_ENTRY_POINT', 'front');
// Boot the app
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'novius-os'.DIRECTORY_SEPARATOR.'framework'.DIRECTORY_SEPARATOR.'bootstrap.php';
Module::load("noviusos_templates_e");

$config = \Nos\Templates\Custom\loadViewConfig();

$parameters= array();
$parameters["text_css"]        = array("path" => "" , "value" => (isset($_REQUEST["txt_css"]) ? $_REQUEST["txt_css"] : ""));
$parameters["select_Skin"]     = array("path" => "" , "value" => (isset($_REQUEST["select_Skin"]) ? $_REQUEST["select_Skin"] : ""));
$parameters["select_sidebar"]  = array("path" => "option.side_bar.position" , "value" => (isset($_REQUEST["select_sidebar"]) ? $_REQUEST["select_sidebar"] : ""));
$parameters["select_nav"]      = array("path" => "option.title.element" , "value" => (isset($_REQUEST["select_nav"]) ? $_REQUEST["select_nav"] : ""));
$parameters["input_facebook"]  = array("path" => "facebook" , "value" => (isset($_REQUEST["input_facebook"]) ? $_REQUEST["input_facebook"] : ""));
$parameters["input_twitter"]   = array("path" => "twitter" , "value" => (isset($_REQUEST["input_twitter"]) ? $_REQUEST["input_twitter"] : ""));
$parameters["input_titre"]     = array("path" => "option.title.title_text" , "value" => (isset($_REQUEST["input_titre"]) ? $_REQUEST["input_titre"] : ""));
$parameters["input_footer"]    = array("path" => "option.footer.text" , "value" => (isset($_REQUEST["input_footer"]) ? $_REQUEST["input_footer"] : ""));
$parameters["input_baseline"]  = array("path" => "option.title.baseline_text" , "value" => (isset($_REQUEST["input_baseline"]) ? $_REQUEST["input_baseline"] : ""));
$parameters["input_image"]     = array("path" => "option.title.url" , "value" => (isset($_REQUEST["input_image"]) ? $_REQUEST["input_image"] : ""));

$tab_temp = array();
$tab_gauche = array();
$tab_droite = array();

if(isset($_REQUEST["tab_gauche"]))
{
    $tab_temp = explode(','  , $_REQUEST["tab_gauche"]);

    foreach($tab_temp as $key => $value)
    {
        $tab_gauche[$value]=Config::get('template.option.side_bar.left_bar.'.$value);
    }

    Config::set('template.option.side_bar.left_bar',  $tab_gauche);
}

$tab_temp = array();
if(isset($_REQUEST["tab_droite"]))
{
    $tab_temp = explode(','  , $_REQUEST["tab_droite"]);

    foreach($tab_temp as $key => $value)
    {
        $tab_droite[$value]=Config::get('template.option.side_bar.right_bar.'.$value);
    }

    Config::set('template.option.side_bar.right_bar',  $tab_droite);
}


$ckeckbox  = \Arr::filter_prefixed($_REQUEST , "chk_");

foreach($config['option']['side_bar']["right_bar"] as $key1 => $value1)
{

        Config::set('template.option.side_bar.right_bar.'.$key1.'.active', "n");
}
foreach($config['option']['side_bar']["left_bar"] as $key1 => $value1)
{

        Config::set('template.option.side_bar.left_bar.'.$key1.'.active', "n");
}


foreach($ckeckbox as $key => $value)
{

        $prefix = explode("_" , $key , 2);
        $nom_module = $prefix[1];
        $side_bar = ($prefix[0] == "rig" ? "right_bar" : "left_bar");


            Config::set('template.option.side_bar.'.$side_bar.'.'.$nom_module.'.active', "y");
}


foreach($parameters as $key => $value)
{
    if($value["path"] != "")
    Config::set('template.'.$value["path"], $value["value"]);
}

$text_css = $parameters["text_css"]["value"];
$skin = $parameters["select_Skin"]["value"];

Config::save('noviusos_templates_e::template' , "template");

if($config["theme_name"] == "bootstrap")
{

    $custom =  file_get_contents("static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/less/skin/Custom.less");


    if( $text_css != $custom && $skin == "Custom")
    {

        file_put_contents("static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/less/skin/Custom.less" ,$text_css );

        include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."local/applications/noviusos_templates_e/vendor/lessphp/Less.php";

        $less = new Less_Parser();

        $variable = array(
        );

        $str_param = "";

        foreach( $variable as $key => $value)
        {
            $str_param .= "$".$key." : ".$value.";\n" ;
        }

        $str_param .= "@import 'Style.less'; \n";

        $less = new Less_Parser();

        $less->SetImportDirs(array("static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/less" => "static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/less",
            "static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/less/bootstrap" => "static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/less/bootstrap"));

        $value = "Custom.less";
        $str_param_setting = "";
        $str =explode(".less",$value);

        $file = file_get_contents("static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/less/bootstrap/bootstrap.less");

        $str_param_setting .= "@import url('bootstrap/variables.less'); \n";
        $str_param_setting .= "@import 'bootstrap/mixins.less'; \n";
        $str_param_setting .= "@import 'skin/$str[0].less'; \n";
        $compiled = "";
        $less->parse($str_param_setting.$file.$str_param);
        try{
            echo $compiled = $less->getCss();
        }catch(Exception $e){
            echo $error_message = $e->getMessage();
        }

        file_put_contents("static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/css/skin/$str[0].css" ,$compiled );
    }
}
else if($config["theme_name"] == "foundation")
{

    file_put_contents("static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/sass/skin/Custom.scss" ,$text_css );

    include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."local/applications/noviusos_templates_e/vendor/scssphp-compass-master/compass.inc.php";
    include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."local/applications/noviusos_templates_e/vendor/scssphp/scss.inc.php";


    $scss = new scssc();
    new scss_compass($scss);

    $str_theme_css = $config['css_default'];
    $str_theme_name = $config["theme_name"];

    $variable = array(
    );

    $str_param = "";

    $file_style = file_get_contents($str_theme_css);

    foreach( $variable as $key => $value)
    {
        $str_param .= "$".$key." : ".$value.";\n" ;
    }

    $str_param .= "@import '".__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."local/applications/noviusos_templates_e/vendor/scssphp-compass-master/stylesheets/compass"."';\n";
    $str_param .= "@import 'Style'; \n";

    $scss->addImportPath("static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/sass/");

    $file = file_get_contents("static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/sass/foundation.scss");

    $str_param_setting = $text_css;
    $compiled = $scss->compile($str_param_setting.$str_param.$file);

    file_put_contents("static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/css/skin/Custom.css" ,$compiled );



}

try {
    // delete_dir($path, $recursive, $delete_top);
    \File::delete_dir(\Config::get('cache_dir').'pages', true, false);
} catch (\InvalidPathException $e) {
    // Dir doesn't exists, no problem
} catch (\Exception $e) {
}
