
    <div class="col-md-12 col-sm-12 col-xs-12 footer">
        <div class="footer_menu">
            <?php
            $result="";
                if(isset($config['option']['footer']['menu']) && $config['option']['footer']['menu']['active']=="y")
                {



                    switch($config['option']['footer']['menu']['type'])
                    {
                        case "menu_id":

                        $result .= '<ul class="nav nav-pills nav-justified" style="text-align: left">';

                            $depth = 3;


                            if ($depth > 0) {
                                $tpvar = \Nos\Nos::main_controller()->getTemplateVariation();
                                $menu = $tpvar->menus->footer;
                                if (!empty($menu)) {
                                    echo $menu->html(array(
                                        'view' => 'noviusos_templates_e::'.$config['theme_name'].'/menu_footer_driver',
                                        'class' => 'nav nav-pills'
                                    ));
                                }

                            }

                    }


                }

            echo $result;
            ?>
        </div>

        <div class="footer_text"><?=$config['option']['footer']['text']?>
        </div>
    </div>
