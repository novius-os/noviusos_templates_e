
    <div class="col-md-12 col-sm-12 col-xs-12 footer">
        <div class="footer_menu">
            <?php
            $result="";
                if(isset($config['option']['footer']['menu']) && $config['option']['footer']['menu']['active']=="y")
                {

                    $result .= '<ul class="nav nav-pills nav-justified" style="text-align: left">';

                    $depth = 3;
                    if ($depth > 0) {
                        $pages = array();
                        $pages = findPages($config['option']['footer']['menu']["page_id"]);
                        $current = \Nos\Nos::main_controller()->getPage()->page_id;

                        if (count($pages)) {

                            foreach ($pages as $p) {


                                if($depth > 1 && count(findPages($p['id'])) != 0)
                                {
                                    $anchor = array('text' => e($p->pick('menu_title', 'title'))."" );
                                }else
                                    $anchor = array('text' => e($p->pick('menu_title', 'title')) );
                                $anchor['style'] = "text-align : left;";
                                $current == $p['id'] && $anchor['class'] = ''.($depth > 1 ? " " : "" );
                                $result .= '<li class="lvl0'. ($depth > 1 ? " " : "" ).'">'. $p->htmlAnchor($anchor);
                                if ($depth > 1) {
                                    $subpages = findPages($p['id']);
                                    if (count($subpages)) {
                                        $result .= '<ul class="nav  nav-pills nav-stacked" style="text-indent: 30px">';
                                        foreach ($subpages as $sp) {
                                            $anchor = array('text' => e($sp->pick('menu_title', 'title')));
                                            $current == $sp['id'] && $anchor['class'] = '';
                                            $result .= '<li class="lvl1">'. $sp->htmlAnchor($anchor);

                                            if ($depth > 2) {
                                                $subpages_2 = findPages($sp['id']);
                                                if (count($subpages_2)) {
                                                    $result .= '<ul class="nav  nav-pills nav-stacked"style="text-indent: 60px">';
                                                    foreach ($subpages_2 as $sp_2) {
                                                        $anchor = array('text' => e($sp_2->pick('menu_title', 'title')));
                                                        $current == $sp_2['id'] && $anchor['class'] = '';
                                                        $result .= '<li class="lvl1">'. $sp_2->htmlAnchor($anchor);



                                                        echo '</li>';

                                                    }
                                                    $result .= '</ul>';
                                                }
                                            }

                                            echo '</li>';

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


                }

            echo $result;
            ?>
        </div>

        <div class="footer_text"><?=$config['option']['footer']['text']?>
        </div>
    </div>
