/**
 * Created by dahan on 26/03/14.
 */

    $(document).ready(function(){


        twitter(document, "script", "twitter-wjs");

        $("#select_Skin").change(function(){


            setStyleSheet($("#select_Skin :selected").attr("value"));
            affiche_content($("#select_Skin :selected").attr("value"));

            if($("#select_Skin :selected").attr("value") == "Custom")
            {
                $("#p_custom").css("display" , "block");
            }
            else
            {
                $("#p_custom").css("display" , "none");
            }
        });

        $("#style_refresh").click(function(){

            $.ajax({
                url:"htdocs/apps/noviusos_templates_e/css_compile.php",
                type:"POST",
                dataType: "html",
                error :function(err){alert("erreur lors de la requete ajax :\n "); console.log(err)},
                beforeSend :function(msg){

                    $("#style_refresh").html("Patientez ...");
                    $("#style_refresh").attr("disabled", true);


                },
                success: function(msg){
                    alert("Styles rafraîchis avec succès !");

                    $("#style_refresh").html("Rafraîchir les styles");
                    $("#style_refresh").attr("disabled", false);
                    window.location.reload();
                }
            });
        })


        $("#style_submit").click(function(){

            $.ajax({
                url:"htdocs/apps/noviusos_templates_e/css_submit.php",
                type:"POST",
                dataType: "html",
                data : $("#form_option").serialize(),
                error :function(){alert("erreur lors de la requete ajax")},
                beforeSend :function(msg){

                    $("#style_submit").html("Patientez ...");
                    $("#style_submit").attr("disabled", true);


                },
                success: function(msg){
                    alert("Style Custom appliqué !");

                    $("#style_submit").html("Enregistrer");
                    $("#style_submit").attr("disabled", false);
                    window.location.reload();
                }
            });
        })



        $("#select_nav").change(function(e){
            if($("#select_nav option:selected").attr("value") == "text")
            {
                $("#input_titre ,label[for='input_titre']").css("display" ,'block');
                $("#input_image, label[for='input_image']").css("display" ,'none');
            }
            else if($("#select_nav option:selected").attr("value") == "image")
            {
                $("#input_titre,label[for='input_titre']").css("display" ,'none');
                $("#input_image,label[for='input_image']").css("display" ,'block');
            }
            else
            {
                $("#input_titre,label[for='input_titre']").css("display" ,'block');
                $("#input_image, label[for='input_image']").css("display" ,'block');

            }
        });
    });

function affiche_content(skin)
{
    $.ajax({
        url:"htdocs/apps/noviusos_templates_e/change_skin.php",
        type:"POST",
        dataType: "html",

        data : "skin="+skin,
        error :function(){alert("erreur lors de la requete ajax")},

        success: function(msg){
        }
    })
}

function twitter(d,s,id) {
    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
    if (1) {//!d.getElementById(id)
        js = d.createElement(s);
        js.id = id;
        js.src = p + "://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
    }
};

function setStyleSheet(title)
{
    var i, obj, found;

    found = false;
    for (i = 0; (obj = document.getElementsByTagName("link")[i]); i++)
    {
        if (obj.getAttribute("rel").indexOf("style") != -1 && obj.getAttribute("title"))
        {
            obj.disabled = true;
            if (obj.getAttribute("title") == title)
            {
                obj.disabled = false;
                found = true;
            }
        }
    }
    if (found == true)
    {
        date = new Date();
        date.setFullYear(date.getFullYear() + 1);
    }
}
