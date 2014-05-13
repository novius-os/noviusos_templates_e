<?php
/**
 * Created by PhpStorm.
 * User: dahan
 * Date: 04/04/14
 * Time: 16:16
 */

$config = \Nos\Templates\Custom\loadViewConfigCustom();


//\Fuel\Core\Debug::dump($page->template_variation->tpvar_data);


$jumbotron = false;
$view = \View::forge("noviusos_templates_e::".$config['theme_name']."/index", array('jumbotron' => $jumbotron, 'page' => $page,
    'title' => $title,
    'wysiwyg' => $wysiwyg,
    'page' => $page,
    'current_context' => $page->get_context()) , false);

echo $view;?>