<?php
/**
 * Created by PhpStorm.
 * User: dahan
 * Date: 15/05/14
 * Time: 09:56
 */
?>

<style>

    .dropdown-submenu{position:relative;}
    .dropdown-submenu>.dropdown-menu{top:0;right:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:6px 0px 6px 6px;-moz-border-radius:6px 0px 6px 6px;border-radius:6px 0px 6px 6px;}
    .dropdown-submenu:hover>.dropdown-menu{display:block;}
    .dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#cccccc;margin-top:5px;margin-right:-10px;}
    .dropdown-submenu:hover>a:after{border-left-color:#ffffff;}
    .dropdown-submenu.pull-left{float:none;}.dropdown-submenu.pull-left>.dropdown-menu{right:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px;}

    .nav > li > div {
        position: relative;
        display: block;
        padding: 10px 15px;
    }

    .navbar-nav > li > div {
        padding-top: 15px;
        padding-bottom: 15px;
    }



    .dropdown-menu > li > div {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: normal;
        line-height: 1.42857;
        color: #FFF;
        white-space: nowrap;
    }

    .item_caret::after{
        content:"";
        display: inline-block;
        width: 0px;
        height: 0px;
        margin-left: 2px;
        vertical-align: middle;
        border-top: 4px solid;
        border-right: 4px solid transparent;
        border-left: 4px solid transparent;
    }
</style>

<?php


$items = $menu->branch();

if (count($items)) {
    ?>
    <ul <?=(isset($class) ? "class=' ".$class." ' " : "" )?> <?=(isset($id) ? "id='".$id."'" : "" )?> >
    <?php
    foreach ($items as $item) {
        $param = (count($menu->branch($item)) < 1 ? array() : array("data-toggle" => "dropdown" , "class" => " item_caret dropdown-toggle"));

        echo '<li class="lvl0">', $item->html($param);
        $subitems = $menu->branch($item);
        if (count($subitems)) {
            echo '<ul class="nobullet submenu dropdown-menu">';
            foreach ($subitems as $si) {
                $param = (count($menu->branch($si)) < 1 ? array() : array("data-toggle" => "dropdown" , "class" => "dropdown-toggle"));
                $css_sub = (count($menu->branch($si)) > 0 ?  "dropdown-submenu" : "" );
                echo '<li class="lvl0 '.$css_sub.'">', $si->html($param);
                $subsubitems = $menu->branch($si);
                if (count($subsubitems)) {
                    echo '<ul class="nobullet submenu dropdown-menu">';
                    foreach ($subsubitems as $ssi) {
                        echo '<li class="lvl1">', $ssi->html(), '</li>';
                    }
                    echo '</ul>';
                }
            }
            echo '</ul>';
        }
        echo '</li>';
    }

    /*if($config["language"] == "y")
    {
        // Display a switch to others contexts home page
        $contexts = \Nos\Tools_Context::contexts();
        $links = array();
        $links[] = '<li class="dropdown"><a href="'.\Nos\Tools_Url::context($current_context).'"  data-toggle="dropdown" class="dropdown-toggle" >'.\Nos\Tools_Context::contextLabel($current_context).'<b class="caret"></b></a><ul class="dropdown-menu">';

        foreach (array_keys($contexts) as $i => $context) {
            if ($context === $current_context) {
                continue;
            }
            $links[] = '<li><a href="'.\Nos\Tools_Url::context($context).'">'.\Nos\Tools_Context::contextLabel($context).'</a></li>';
        }
        if (!empty($links)) {
            echo  implode(' ', $links);
        }
        echo '</ul></li>';
    }*/

    echo '</ul>';
}

?>
