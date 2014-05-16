<?php
/**
 * Created by PhpStorm.
 * User: dahan
 * Date: 14/03/14
 * Time: 14:29
 */

function T_affiche_article($tab_article)
{

    foreach ($tab_article as $key => $value) {
        echo "<h1 style='border-bottom: 1px solid black'> " . $value["Titre"] . "</h1>" . $value["Texte"];
    }
}


function T_affiche_menu($tab_menu)
{
    foreach ($tab_menu as $key => $value) {
        ?>

        <li class="">
            <a href="#"><?= $value ?></a>
        </li>

    <?php
    }


}

function side_bar($position, $config)
{


    $str_bar = "";
    $result = "";

    $colsm = "12";
    $offset = "";

    $str_prio_class = "";

    if ($position == "left") {
        $offset = ""; //col-md-offset-1
        $str_bar = "left_bar";
    } else {
        $str_bar = "right_bar";
    }

    if ($config['option']['side_bar']['priority'] == $position) {
        $colsm = "3";
        $str_prio_class = "priority";
    } else {
        $str_prio_class = "non-priority";
    }

    $result .= '<div id="sidebar-wrapper" class="' . $offset . ' col-md-3 col-sm-' . $colsm . ' col-xs-12 ' . $str_prio_class . '">';

    foreach ($config["option"]["side_bar"][$str_bar] as $key => $value) {

        if (isset ($value["type"])) {

            switch ($value["type"]) {


                case "menu_id":
                    if ($value["active"] == "y") {
                        $depth = 3;
                        if ($depth > 0) {
                            $tpvar = \Nos\Nos::main_controller()->getTemplateVariation();
                            $menu = ($position == "left" ? $tpvar->menus->left : $tpvar->menus->right);
                            if (!empty($menu)) {
                                $result .=  $menu->html(array(
                                    'view' => 'noviusos_templates_e::' . $config['theme_name'] . '/menu_side_driver',
                                    'class' => 'nav nav-pills nav-stacked  sidebar-nav-2 sidebar-menu ',
                                ));
                            }

                        }
                    }
                    break;
                case "social" :
                    if ($value["active"] == "y") {
                        $result .= '<div class="panel panel-default">
                                          <div class="panel-heading">
                                            <h3 class="panel-title">Social</h3>
                                          </div>
                                          <div class="panel-body" id="social">
                                                <ul class=" social">';


                        foreach ($value["list_social"] as $key_social => $value_social) {
                            if ($value_social['link'] != "#") {
                                $result .= '<li><a href="' . ($value_social['link'] == "#" ? $config[$value_social['name']] : $value_social['link']) . '"><button class="btn btn-' . $value_social['name'] . '"><i class="fa fa-' . $value_social['name'] . '"></i> <span>| ' . $value_social['text'] . '<span></button></a>';
                                $result .= '</li>';
                            }
                        }

                        $result .= '</div></div>';

                    }
                    break;
                case "twitterTL":
                    if ($value["active"] == "y") {
                        $result .= '<a class="twitter-timeline"  href="https://twitter.com"
                               data-widget-id="448388405479501824"
                               data-screen-name="' . ($value["account_name"] == "#" ? end(explode("/", $config["twitter"])) : $value["account_name"]) . '" height="500" data-tweet-limit="' . $value["account_name"] . '">' . $value["text"] . '</a>';

                    }
                    break;

                case "panel":
                    if ($value["active"] == "y") {
                        $result .= " <div class='panel panel-default''>
                                      <div class='panel-heading'>
                                        <h3 class='panel-title'>" . $value['title'] . "</h3>
                                      </div>
                                      <div class='panel-body'>
                                        " . $value['content'] . "
                                      </div>
                                    </div>";
                    }

                    break;


            }
        }

    }

    $result .= "</div>";

    return $result;

}
