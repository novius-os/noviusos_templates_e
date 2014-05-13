<?php

define('NOS_ENTRY_POINT', 'front');

// Boot the app
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'novius-os'.DIRECTORY_SEPARATOR.'framework'.DIRECTORY_SEPARATOR.'bootstrap.php';

Module::load("noviusos_templates_e");

$config = \Nos\Templates\Custom\loadViewConfigCustom();

$skin ="";

foreach($_REQUEST as $key => $value)
{
    if($key == "skin")
    {
        $skin = $value;
    }
}

Config::set('template.skin', $value);
Config::save('noviusos_templates_e::template' , "template");



