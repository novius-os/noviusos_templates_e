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
Module::load("noviusos_templates_custom");

$config = \Nos\Templates\Custom\loadViewConfig();

set_time_limit(1000000);

if($config["theme_name"] == "bootstrap")
{

    include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."local/applications/noviusos_templates_custom/vendor/lessphp/Less.php";

    $less = new Less_Parser();

    $variable = array(
    );

    $str_param = "";

    foreach( $variable as $key => $value)
    {
        $str_param .= "$".$key." : ".$value.";\n" ;
    }

    $str_param .= "@import 'Style.less'; \n";

    //------------------------------
    // Compilation des autres styles
    //------------------------------

    $tab_skin = array_diff(scandir("static/apps/noviusos_templates_custom/vendor/".$config["theme_name"]."/less/skin"), array('..', '.' ));

    foreach($tab_skin as $key => $value)
    {

        $less = new Less_Parser();

        $less->SetImportDirs(array("static/apps/noviusos_templates_custom/vendor/".$config["theme_name"]."/less" => "static/apps/noviusos_templates_custom/vendor/".$config["theme_name"]."/less",
            "static/apps/noviusos_templates_custom/vendor/".$config["theme_name"]."/less/bootstrap" => "static/apps/noviusos_templates_custom/vendor/".$config["theme_name"]."/less/bootstrap"));


        $str_param_setting = "";
        $str =explode(".less",$value);

        $file = file_get_contents("static/apps/noviusos_templates_custom/vendor/".$config["theme_name"]."/less/bootstrap/bootstrap.less");

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

        file_put_contents("static/apps/noviusos_templates_custom/vendor/".$config["theme_name"]."/css/skin/$str[0].css" ,$compiled );
    }
}
else if($config["theme_name"] == "foundation")
{
    include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."local/applications/noviusos_templates_custom/vendor/scssphp-compass-master/compass.inc.php";
    include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."local/applications/noviusos_templates_custom/vendor/scssphp/scss.inc.php";

    $scss = new scssc();
    new scss_compass($scss);

    //------------------------------
    // Compilation du style courant
    //------------------------------


    $variable = array(
    );

    $str_param = "";

    foreach( $variable as $key => $value)
    {
        $str_param .= "$".$key." : ".$value.";\n" ;
    }

    $str_param .= "@import '".__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR."local/applications/noviusos_templates_custom/vendor/scssphp-compass-master/stylesheets/compass"."';\n";
    $str_param .= "@import 'Style'; \n";

    //------------------------------
    // Compilation des autres styles
    //------------------------------

    $scss->addImportPath("static/apps/noviusos_templates_custom/vendor/".$config["theme_name"]."/sass/");
    $tab_skin = array_diff(scandir("static/apps/noviusos_templates_custom/vendor/".$config["theme_name"]."/sass/skin"), array('..', '.' ));

    foreach($tab_skin as $key => $value)
    {

        $str =explode(".scss",$value);

        $file = file_get_contents("static/apps/noviusos_templates_custom/vendor/".$config["theme_name"]."/sass/foundation.scss");

        $str_param_setting = "@import 'skin/$str[0]'; \n";
        $compiled = $scss->compile($str_param_setting.$str_param.$file);

        file_put_contents("static/apps/noviusos_templates_custom/vendor/".$config["theme_name"]."/css/skin/$str[0].css" ,$compiled );
    }


}
