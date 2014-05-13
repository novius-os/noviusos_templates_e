<?php
/**
 * Created by PhpStorm.
 * User: dahan
 * Date: 04/04/14
 * Time: 16:16
 */
$config = \Nos\Templates\Custom\loadViewConfigCustom();


$jumbotron = true;
$view = \View::forge("noviusos_templates_e::".$config['theme_name']."/index", array('jumbotron' => $jumbotron,
    'page' => $page,
    'title' => $title,
    'wysiwyg' => $wysiwyg,
    'current_context' => $page->get_context()) , false);

echo $view;?>
