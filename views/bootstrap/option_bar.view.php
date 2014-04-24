<?php
/**
 * Created by PhpStorm.
 * User: dahan
 * Date: 03/04/14
 * Time: 18:15
 */

$side_nav = $config["option"]["title"]["element"];
$side_bar = $config["option"]["side_bar"]["position"];
?>


<div class="container-fluid">
    <div id="optionbar" class=" col-md-3" style="display: none ;">
        <div class="panel panel-default " style="overflow: auto">
            <div class="panel-heading">

                <h3 class="panel-title"> Personnalisation:</h3> <h6>(Appuyer sur ENTREE pour valider une
                    modification)</h6>

            </div>
            <div class="panel-body" >

                <form id="form_option" autocomplete="off" onsubmit="return false;">

                    <div>
                        <label for="select_Skin"><h5>Skin:</h5></label>
                        <button id="btn_swt_skin" type="button" style="float: right"><i class="switch_on glyphicon glyphicon-collapse-down"></i></button>
                        <br>
                        <div>
                            <select id="select_Skin" name="select_Skin">
                                <?php

                                foreach($tab_skin as $key => $value)
                                {
                                    $chaine = explode(".css", $value);
                                    echo '<option value="'.$chaine[0].'" '.($chaine[0] == $str_skin_name ? "selected" : '').'>'.$chaine[0].'</option>';
                                }

                                ?>
                            </select>
                            <button id="style_refresh" name ="style_refresh" style="display: block">Rafraîchir les styles</button>
                            <br><br>
                        </div>



                        <div id="div_custom" style="display: <?= $str_skin_name == "Custom" ? "block" : "none" ?>">
                            <textarea id="txt_css" name="txt_css" placeholder="Placez votre sass ici" style="max-width: 250px ;  height: 150px ; position: relative ;"><?php

                                echo file_get_contents("static/apps/noviusos_templates_e/vendor/".$config["theme_name"]."/less/skin/Custom.less");

                                ?></textarea><br>

                            <br><hr style="margin-top: 5px ;margin-bottom: 5px ; border-color: #DDD"><br>
                        </div>
                    </div>


                    <div>
                        <label for="select_sidebar"><h5>Side bar:</h5></label>
                        <button id="btn_swt_side_bar" type="button" style="float: right"><i class="switch_on glyphicon glyphicon-collapse-down"></i></button>

                        <div>
                                <br><select id="select_sidebar" name="select_sidebar">
                                    <option value="left" <?=$side_bar == "left" ? "selected" : ""?>>Left</option>
                                    <option value="right"<?=$side_bar == "right" ? "selected" : ""?>>Right</option>
                                    <option value="both" <?=$side_bar == "both" ? "selected" : ""?>>Both</option>
                                    <option value="none" <?=$side_bar == "none" ? "selected" : ""?>>None</option>
                                </select><br><br>


                            <div>
                                <ul class="nav nav-tabs">
                                    <li id="tab_left" class="active" ><a href="#">Left</a></li>
                                    <li id="tab_right"><a href="#">Right</a></li>
                                </ul>
                            </div>
                            <div id="div_tab_left" style="display: block"><br>
                                <label style="margin-left: 10px ;">Modules :</label><br>

                                <?php
                                $i = 1;
                                echo "<ul class='ul_sort'>";
                                    foreach( $config['option']['side_bar']['left_bar'] as $key=> $value)
                                    {
                                        echo"<li id='".$key."'> ";
                                        echo '<label style="margin-left: 10px ; width: 100%;">
                                                    <input type="checkbox" id="chk_lef_'.$key.'" name="chk_lef_'.$key.'" '. ($value['active']== "y" ?  "checked" : "").'> '.$key.'
                                               </label><br>';
                                        echo"</li>";
                                        $i++;
                                    }
                                echo "</ul>";

                                ?>

                             </div>
                            <div id="div_tab_right" style="display: none"><br>
                                <label style="margin-left: 10px ;">Modules :</label><br>
                                <?php
                                    $i = 1;
                                    echo "<ul class='ul_sort'>";
                                    foreach( $config['option']['side_bar']['right_bar'] as $key=> $value)
                                    {
                                        echo"<li id='".$key."'> ";
                                        echo '<label style="margin-left: 10px ; width: 100%;"> <input type="checkbox" id="chk_rig_'.$key.'" name="chk_rig_'.$key.'" '.
                                            ($value['active']== "y" ?  "checked" : "").'> '.$key.'</label><br>';
                                        echo"</li>";
                                        $i++;
                                    }
                                echo "</ul>";

                                ?>

                            </div>


                            <br><hr style="margin-top: 5px ;margin-bottom: 5px ; border-color: #DDD"><br>
                        </div>

                    </div>

                    <div>
                        <label for=""><h5>Social:</h5></label>
                        <button id="btn_swt_social" type="button" style="float: right"><i class="switch_on glyphicon glyphicon-collapse-down"></i></button>

                        <div>
                            <label for="input_facebook">Compte facebook:</label><br>
                            <input type="text" id="input_facebook" name="input_facebook"
                                   placeholder="Ex : https://www.facebook.com/noviusfr" value="<?=$config["facebook"]?>">
                            </p>
                            <p>
                                <label for="input_twitter">Compte twitter:</label><br>
                                <input type="text" id="input_twitter" name="input_twitter" placeholder="Ex : NoviusOS" value="<?=$config["twitter"]?>">
                            </p>
                            <hr style="margin-top: 5px ;margin-bottom: 5px ; border-color: #DDD">
                        </div>
                    </div>



                    <div>

                        <label for=""><h5>Header:</h5></label>
                        <button id="btn_swt_header" type="button" style="float: right"><i class="switch_on glyphicon glyphicon-collapse-down"></i></button>


                        <div>

                            <p>

                            <label for="select_nav">Nav bar:</label><br>
                            <select id="select_nav" name="select_nav">
                                <option value="text" <?=$side_nav == "text" ? "selected" : ""?>>Title</option>
                                <option value="image" <?=$side_nav == "image" ? "selected" : ""?>>Image</option>
                                <option value="both" <?=$side_nav == "both" ? "selected" : ""?>>Both</option>
                            </select>
                            </p>
                            <p>

                                <label for="input_titre">Titre site:</label><br>
                                <input type="text" id="input_titre" name="input_titre" placeholder="Ex : TemplateTropCool.com"
                                       value="<?=$config["option"]["title"]["title_text"]?>">
                            </p>

                            <p>
                                <label for="input_image" style="display: block">Image url:</label><br>
                                <input type="text" id="input_image" name="input_image" placeholder="Ex : http://" style="display: block" value="<?=$config["option"]["title"]["url"]?>">
                            </p>

                            <p>
                                <label for="input_baseline">Baseline:</label><br>
                                <input type="text" id="input_baseline" name="input_baseline" placeholder="Ex : Le site cool"
                                       value="<?=$config["option"]["title"]["baseline_text"]?>">
                            </p>

                        </div>

                    </div>

                    <div>

                        <label for=""><h5>Footer:</h5></label>
                        <button id="btn_swt_footer" type="button" style="float: right"><i class="switch_on glyphicon glyphicon-collapse-down"></i></button>


                        <div>


                            <p>
                                <label for="input_footer">Texte Footer:</label><br>
                                <input type="text" id="input_footer" name="input_footer"
                                       placeholder="Cover template for Novius OS"
                                       value="<?=$config["option"]["footer"]["text"]?>">
                            </p>
                        </div>

                    </div>
                       <br><br>
                    <button id="style_submit" name ="style_submit" class="btn btn-primary" disabled>Enregistrer</button>

                </form>


            </div>


        </div>
    </div>


