<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

Nos\I18n::current_dictionary('noviusos_templates_e::common');
/**
 * Created by PhpStorm.
 * User: dahan
 * Date: 11/03/14
 * Time: 16:20
 */

//------------------------------
// Configuration
//------------------------------



$data = include "data.config.php";

$str_theme_name = $data['template'];
$str_skin_name= $data['skin'];

if($str_theme_name == "bootstrap")
{
    $file_css = "static/apps/noviusos_templates_e/vendor/".$str_theme_name."/less/Style.less";
}
else
{
    $file_css = "static/apps/noviusos_templates_e/vendor/".$str_theme_name."/sass/Style.scss";
}

return array(

    //------------------------------
    // Setup de base
    //------------------------------

    "theme_name" => $str_theme_name,
    "skin" => $str_skin_name,
    "css_default" => $file_css,
    "function_file" => "fonctions.view.php",
    "language" => "y", //option de changement de contexte dans la nav bar
    "option_bar" => "y",

    //------------------------------
    // Reseau sociaux
    //------------------------------

    "facebook" => "https://www.facebook.com/noviusfr",
    "twitter" => "https://twitter.com/NoviusOS",
    "google-plus" => "",
    "github" => "",

    //------------------------------
    // Options
    //------------------------------

    "option" => array(


        //------------------------------
        // Options de header
        //------------------------------

        "header_menu" => array(
            "active" => "y", // y , n
            "page_id"=> "5" // entier , identifiant de la page

        ),

        //------------------------------
        // Options de jumbotron
        //------------------------------

        "jumbotron" => array(
            "title" => "Hello world!",
            "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam gravida libero vel magna cursus semper.",
            "button_title" => "Learn more",
            "button_link" => "#"

        ),

        //------------------------------
        // Options de side bar
        //------------------------------

        "side_bar" => array(

            "position" => "both", // left , right , both , none
            "priority" => "left", //left,right,none


            //------------------------------
            // Side bar de droite
            //------------------------------

            "right_bar" => array(

                /*
                 * "Nom module" => array (
                 *
                 * "type" => "" : social / twitterTL / panel / menu / menu_id
                 *
                 * --------------------------------------------------
                 * "type" => "social" :
                 * -------------------
                 *
                 * Ensemble de boutons de réseaux sociaux
                 *
                 * "active" => "y" : y/n
                 * "list_social" => array(
                 *
                 *   array(  "name" => "" : facebook / google-plus / twitter / github / tumbler ...
                 *           "link" => "#" : lien vers le compte
                 *           "text" => "" : Texte associé au bouton social
                 *        )
                 * )
                 *
                 * --------------------------------------------
                 * "type" => "twitterTL" :
                 * ----------------------
                 * Time line des derniers tweets
                 *
                 *
                 *    "active" => "y" : y , n
                 *    "account_name" => "#" : Nom du compte twitter
                 *    "tweet_limit" => "3": Nombre de tweets visibles en meme temps
                 *    "text" => "" : Texte de remplacement
                 *
                 *
                 * --------------------------------------------
                 * "type" => "panel" :
                 * -------------------
                 * Panel de contenu simple
                 *
                 *   "active" => "y" : y , n,
                 *   "title" => "" : Titre du panel
                 *   "content" => "" : Texte du panel
                 *
                 *
                 *--------------------------------------------
                 * "type" => "menu_id" :
                 * --------------------
                 *   "active" => "y" : y , n
                 *   "page_id"=> null : Identifiant de page pour le menu
                 *
                 */



                "Social" => array("type" => "social",
                    "active" => "y",
                    "list_social" => array(
                        array(
                            "name" => "facebook",
                            "link" => "#",
                            "text" => "Facebook"
                        ),
                        array("name" => "twitter", "link" => "#", "text" => "Twitter"),
                        array("name" => "google-plus", "link" => "#", "text" => "Google+"),
                        array("name" => "github", "link" => "#", "text" => "Github"))),

                "Time_line_Twitter" => array("type" => "twitterTL", // Twitter time line
                    "active" => "y",
                    "account_name" => "#",
                    "tweet_limit" => "100",
                    "text" => "Tweets"),

                "Panel_1" => array("type" => "panel",
                    "active" => "n",
                    "title" => "Me contacter :",
                    "content" => "0678452101 Robert.machin@gmail.com "),

                "Panel_2" => array("type" => "panel",
                    "active" => "n",
                    "title" => "Prochaine réunion :",
                    "content" => "Mercredi 18 décembre à 18h30 salle des marmottes")
            ),

            //------------------------------
            // Side bar de gauche
            //------------------------------

            "left_bar" => array(


                "MenuId" => array("type" => "menu_id",
                    "active" => "y",
                    "page_id"=> null),


                "Menu" => array("type" => "menu",
                    "active" => "n",
                    "menu_list" => array(array("title" => "Start Bootstrap", "link" => "#"),
                        array("title" => "Dashboard", "link" => "#"),
                        array("title" => "Shortcut", "link" => "#"),
                        array("title" => "Overview", "link" => "#"),
                        array("title" => "Events", "link" => "#"),
                        array("title" => "About", "link" => "#"),
                        array("title" => "Services", "link" => "#"),
                        array("title" => "Contact", "link" => "#"),
                    ),
                ),
                "Panel_1" => array("type" => "panel",
                    "active" => "n",
                    "title" => "Boutique",
                    "content" => "N'oubliez pas d'acheter nos nouveaux produit !"),

                "Time_line_Twitter" => array("type" => "twitterTL", // Twitter time line
                    "active" => "n",
                    "account_name" => "Noviusinfo",
                    "tweet_limit" => "100",
                    "text" => "Tweets"),
            )
        ),
        //------------------------------
        // Options de titre
        //------------------------------

        "title" => array(

            "element" => "both", // image , text , both
            "url" => "static/apps/noviusos_templates_e/img/novius.png",
            "title_text" => "TemplateDeclinaison.com",
            "baseline_text" => "Le template declinable",
        ),

        //------------------------------
        // Options de footer
        //------------------------------

        "footer" => array(
            "text" => "Cover template for Novius OS"
        )



    ),

);



