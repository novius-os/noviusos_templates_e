<?php
/**
 * Created by PhpStorm.
 * User: dahan
 * Date: 03/04/14
 * Time: 18:15
 */

?>

<style>

    .optionbar_button {

        font-size: 30px;
        float: left;
        position: fixed;
        z-index: 3000;
        opacity: 0.2;

    }

    #optionbar input[type='text'] , select , textarea{
        width : 250px;
    }

    .optionbar_button:hover {

        opacity: 0.8;

    }

</style>

<div class="container-fluid">
    <div id="optionbar" class=" col-md-3" style="display: none">
        <div class="panel panel-default ">
            <div class="panel-heading">

                <h3 class="panel-title"> Personnalisation:</h3> <h6>(Appuyer sur ENTREE pour valider une
                    modification)</h6>

            </div>
            <div class="panel-body">

                <form id="form_option" autocomplete="off" onsubmit="return false;">

                    <p>
                        <label for="select_Skin">Skin:</label>
                        <select id="select_Skin" name="select_Skin">
                            <?php

                            foreach($tab_skin as $key => $value)
                            {
                                $chaine = explode(".css", $value);
                                echo '<option value="'.$chaine[0].'" '.($chaine[0] == $str_skin_name ? "selected" : '').'>'.$chaine[0].'</option>';
                            }

                            ?>
                        </select>
                    </p>
                    <p>
                        <button style="display: none" class="btn btn-primary" id="style_refresh" name ="style_refresh">Rafraîchir les styles</button>

                    </p>
                    <p id="p_custom" style="display: <?= $str_skin_name == "Custom" ? "block" : "none" ?>">
                        <textarea id="txt_css" name="txt_css" placeholder="Placez votre sass ici" style="max-width: 250px ;  height: 150px ; position: relative ;"><?php

                            echo file_get_contents("static/apps/noviusos_templates_custom/vendor/".$config["theme_name"]."/less/skin/Custom.less");




                            ?></textarea><br><br>
                        <button id="style_submit" name ="style_submit" class="btn btn-primary" >Enregistrer</button>
                    </p>

                    <p>
                        <label for="select_sidebar">Side bar:</label>
                        <select id="select_sidebar" name="select_sidebar">
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                            <option value="both" selected>Both</option>
                            <option value="none">None</option>
                        </select>
                    </p>
                </form>


            </div>


        </div>
    </div>


