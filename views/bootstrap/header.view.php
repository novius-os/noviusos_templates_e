<?php


$str_img = "<p class='image'> <img src=\"".$config['option']['title']['url']."\"></p>";
$str_img_small = "<span class='image_small'> <img src=\"".$config['option']['title']['url']."\"></span>";
$str_title_small = "<span class='title_small'>".$sitename."</span>";
$str_title = "<span style='font-size: 20px ; line-height : 20px'>".$sitename."</span><br>";
$str_baseline = "<span style='font-size: 13px'>".$config['option']['title']["baseline_text"]."</span>";
$id_text = "title";
$top = "-50px";

    switch($config['option']['title']['element'])
    {
        case "text":
            $str_img ="<!--<img src='img/trombone.png'>-->";
            $id_text = "titleonly";
            $str_img_small ="";
            $str_title_small = "<span class='title_small_only'>".$config['option']['title']["title_text"]."</span>";
            break;
        case "image":
            $str_title ="";
            $str_title_small = "";
            break;
        case "both":
            break;
    }


$path_img = "static/apps/noviusos_templates_e/img/";


$depth = 3;


?>


<div class="head_content">
    <nav class="navbar navbar-inverse " role="navigation">

        <div class="navbar-header">

            <a class="navbar-brand" id="sitename" href="<?=\Nos\Tools_Url::context(\Nos\Nos::main_controller()->getPage()->get_context()); ?>"><?= $str_img_small ?><?= $str_title_small ?></a>
            <?php if($config['option']['header_menu']['active'] == "y"){
                $top = "-72px";
                ?>
            <button class="navbar-toggle collapsed right" data-target=".navbar-collapse" data-toggle="collapse"
                    type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <?php }?>
        </div>
    <?php if($config['option']['header_menu']['active'] == "y"){ ?>
        <div class="container collapse navbar-collapse">
                <?php

                if ($depth > 0) {
                    $tpvar = \Nos\Nos::main_controller()->getTemplateVariation();
                    $menu = $tpvar->menus->principal;
                    if (empty($menu)) {
                        $menu = \Nos\Menu\Model_Menu::buildFromPages(\Nos\Nos::main_controller()->getContext());
                    }
                    echo $menu->html(array(
                        'view' => 'noviusos_templates_e::'.$config['theme_name'].'/menu_header_driver',
                        'id' => 'list-menu',
                        'class' => 'nav navbar-nav navbar-right'
                    ));
                }

            }?>
        </div>

    </nav>
    <div class="nav-logo" style="top :<?=$top?>">
        <a href="#">
            <?= $str_img ?>
            <p class="<?=$id_text?>">
                <?= $str_title ?>
                <?= $str_baseline ?>
            </p>
        </a>
    </div>
</div>



