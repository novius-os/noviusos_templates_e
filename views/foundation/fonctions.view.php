<?php
/**
 * Created by PhpStorm.
* User: dahan
* Date: 14/03/14
* Time: 14:29
*/

function T_affiche_article($tab_article)
{

    foreach($tab_article as $key => $value)
    {
        echo "<h1 style='border-bottom: 1px solid black'> ".$value["Titre"]."</h1>".$value["Texte"];
    }
}


function T_affiche_menu($tab_menu)
{
    foreach($tab_menu as $key => $value)
    {
        ?>

        <li  class="">
            <a href="#"><?= $value ?></a>
        </li>

    <?php  }


}

function side_bar($position , $config)
{


    $str_bar = "";
    $result = "";

    $colsm ="12";
    $offset="";

    $str_prio_class = "";

    if($position== "left")
    {
        $offset = ""; //col-md-offset-1
        $str_bar = "left_bar";
    }
    else
    {
        $str_bar = "right_bar";
    }

    if($config['option']['side_bar']['priority'] == $position)
    {
            $colsm = "3";
            $str_prio_class = "priority";
    }
    else
    {
            $str_prio_class = "non-priority";
    }

    $result .='<div id="sidebar-wrapper" class="'.$offset.' large-3 medium-'.$colsm.' small-12 '.$str_prio_class.' columns">';

    foreach($config["option"]["side_bar"][$str_bar] as $key => $value)
    {
        if($value["active"] == "y")
        {
            switch($value["type"])
            {
                case "menu":

                    $result .= '<ul class="side-nav">';
                    foreach($value["menu_list"] as $key_menu => $value_menu)
                    {

                        $result .=  '<li class=""><a href='.$value_menu['link'].'>'.$value_menu['title'].'</a>';
                        $result .=  '</li>';
                    }


                    $result .= '</ul>';



                    break;
                case "menu_id":

                    $result .= '<ul class="side-nav">';

                    $depth = 2;
                    if ($depth > 0) {
                        $pages = array();
                        $pages = findPages($value["page_id"]);
                        $current = \Nos\Nos::main_controller()->getPage()->page_id;

                        if (count($pages)) {

                    foreach ($pages as $p) {


                        if($depth > 1 && count(findPages($p['id'])) != 0)
                        {
                            $anchor = array('text' => e($p->pick('menu_title', 'title'))." <b class='caret'></b>" );
                            $anchor['data-options']="align:bottom";
                            $anchor['data-dropdown']="side-menu".$position;
                            $anchor['class']="side-dropdown";

                        }else
                            $anchor = array('text' => e($p->pick('menu_title', 'title')) );

                        $current == $p['id'] && $anchor['class'] = 'active '.($depth > 1 ? "" : "" );
                        $result .= '<li class="lvl0'.($current == $p['id'] ? " active " : "" ) . ($depth > 1 ? "" : "" ).'">'. $p->htmlAnchor($anchor);
                        if ($depth > 1) {
                            $subpages = findPages($p['id']);
                            if (count($subpages)) {
                                $result .= '<ul class="f-dropdown" id="side-menu'.$position.'">';
                                foreach ($subpages as $sp) {
                                    $anchor = array('text' => e($sp->pick('menu_title', 'title')));
                                    $current == $sp['id'] && $anchor['class'] = 'active';
                                    $result .= '<li class="lvl1">'. $sp->htmlAnchor($anchor). '</li>';
                                }
                                $result .= '</ul>';
                            }
                        }
                        $result .= '</li>';
                    }
                    $result .= '</ul>';
                }
        }


                     $result .= '</ul>';



                    break;
                case "social":

                    $result .= '<div class="panel panel-default">
                                          <div class="panel-heading">
                                            <h4 class="panel-title">Social :</h4>
                                          </div>
                                          <div class="panel-body" id="social">
                                                <ul class=" social">';


                    foreach($value["list_social"] as $key_social => $value_social)
                    {

                        $result .=  '<li><a href="'.($value_social['link']== "#" ? $config[$value_social['name']]:$value_social['link']).'" class="no-svg"><i class="webicon large '.($value_social['name']).'"></i></a>';
                        $result .=  '</li>';
                    }

                    $result .= '</div></div>';



                    break;
                case "twitterTL":

                    $result .= '<a class="twitter-timeline"  href="https://twitter.com"
                               data-widget-id="448388405479501824"
                               data-screen-name="'.($value["account_name"]== "#" ? end(explode("/" ,$config["twitter"])) : $value["account_name"]).'" height="500" data-tweet-limit="'.$value["account_name"].'">'.$value["text"].'</a>';

                    break;

                case "panel":

                     $result .= " <div class='panel panel-default''>
                                      <div class='panel-heading'>
                                        <h4 class='panel-title'>".$value['title']."</h4>
                                      </div>
                                      <div class='panel-body'>
                                        ".$value['content']."
                                      </div>
                                    </div>";

                    break;


            }
        }

    }

    $result .= "</div>";

    return $result;

}
