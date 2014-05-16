
define(
    [
        'jquery-nos'
    ],
    function($) {
        "use strict";
        return function($container) {

            var tab_panel_left = new Array(6);
            var tab_panel_right = new Array(6);
            var tab_panel = new Array(2);
            tab_panel[0] = tab_panel_left;
            tab_panel[1] = tab_panel_right;

            //----------------------------------------------
            // Initialisation de la page
            //-----------------------------------------------

            // Mise à defaut des selecteurs de modules

            $container.find("select[name^='_select'] option[value='']").prop("selected" , true)

            // On cache les checkboxs des modules

            $container.find("input[type='checkbox'][name^='option-side_bar']").css("display" , "none")

            // Ajout des flèches et boutons pour chaque checkbox de module

            $container.find("input[name^='option-side_bar'][type='checkbox']").parent()
                .append("<button class='suppr' type='button' style='float:right; margin-left:5px;'>x</button>"
                    +"<span style='float:right;'><i class='icon ui-icon ui-icon-arrowthick-1-s'></i></span>"
                    +"<span style='float:right;'><i class='icon ui-icon ui-icon-arrowthick-1-n'></i></span>")
                .closest("tr").hide();




            //----------------------------------------------
            // Gestion des associations checkbox <=> Modules
            //-----------------------------------------------

            $("input[type='checkbox'][name^='option-side_bar-'][name*='Panel']").each(function(){

                checkboxComponentAssoc($(this) , findComponent("panel" , "checkbox" ,$(this)) );
            });

            $("input[type='checkbox'][name^='option-side_bar-'][name*='Twitter']").each(function(){

                checkboxComponentAssoc($(this) , findComponent("twitter" , "checkbox" ,$(this)) );
            });

            $("input[type='checkbox'][name^='option-side_bar-'][name*='Menu']").each(function(){

                checkboxComponentAssoc($(this) , findComponent("menu" , "checkbox" ,$(this)) );
            });

            $("input[type='checkbox'][name^='option-side_bar-'][name*='Social']").each(function(){

                checkboxComponentAssoc($(this) , findComponent("social" , "checkbox" ,$(this)) );
            });

            // On affiche et classe les modules enregistrés
            loadInputOrder();

            // On affiche les flèches en conséquence
            reindexArrow();


            //----------------------------------------------
            // Gestion Titre de panel
            //-----------------------------------------------

            $("input[name*='title'][name*='Panel']").focusout(function(){
                findComponent("label" , "inputTitle" , $(this)).html($(this).val());
                findComponent("panelTitle" , "inputTitle" , $(this)).html($(this).val());
            });


            //----------------------------------------------
            // Gestion du jumbotron
            //-----------------------------------------------

            if(!$("[name='option-jumbotron-active']").is(":checked"))
                $("[name='option-jumbotron-title']").closest("div.expander").hide();

            $("[name='option-jumbotron-active']").click(function(){
                if(!$("[name='option-jumbotron-active']").is(":checked"))
                    $("[name='option-jumbotron-title']").closest("div.expander").hide();
                else
                    $("[name='option-jumbotron-title']").closest("div.expander").show();
            });


            //----------------------------------------------
            // Gestion de l'affichage des Bloc des side bars
            //-----------------------------------------------

            if($("select[name='option-side_bar-position'] :selected").attr("value") == "left")
            {
                $container.find("table").parent().parent().last().hide();
            }
            else if($("select[name='option-side_bar-position'] :selected").attr("value") == "right")
            {
                $container.find("table").parent().parent().first().hide();
            }
            else if($("select[name='option-side_bar-position'] :selected").attr("value") == "none")
            {
                $container.find("table").parent().parent().hide();
                $container.find("table").parent().parent().hide();
            }

            $("select[name='option-side_bar-position']").change(function(){

                var right = $container.find("table").parent().parent().last();
                var left = $container.find("table").parent().parent().first();
                var attr = $("select[name='option-side_bar-position'] :selected").attr("value");



                if(attr == "left")
                {
                    right.hide().find("input[type='checkbox']").prop("checked" , false);
                    left.show().find("input[type='checkbox']").prop("checked" , true);
                }
                else if(attr == "right")
                {
                    left.hide().find("input[type='checkbox']").prop("checked" , false);
                    right.show().find("input[type='checkbox']").prop("checked" , true);
                }
                else if(attr == "none")
                {
                    left.hide();
                    right.hide();
                    $container.find("input[type='checkbox']").prop("checked" , false);
                }
                else
                {
                    left.show().find("input[type='checkbox']").prop("checked" , true);
                    right.show().find("input[type='checkbox']").prop("checked" , true);
                }
            });


            //----------------------------------------------
            // Gestion la suppression d'un module
            //-----------------------------------------------

            $container.on('click' , "button.suppr", function(){
                var $tr = $(this).closest("tr");
                $tr.find("input").trigger("click");
                $tr.hide();
                $tr.removeClass("active");
                findComponent("inputTitle" , "checkbox" , $tr.find("input")).val("");
                reindexArrow();
                saveInputOrder()

                });


            //----------------------------------------------
            // Gestion des fléches d'ordonnancement des modules
            //-----------------------------------------------

            $container.on('mouseover' , "span", function(e){

                $(this).addClass("ui-state-hover");

            });
            $container.on('mouseout' , "span", function(e){

                $(this).removeClass("ui-state-hover");

            });

            $container.on('click' , "span i.ui-icon-arrowthick-1-n", function(e){
                var $this = $(this).closest("tr");
                $(this).parent().removeClass("ui-state-hover");
                $this.insertBefore( $this.prevAll("tr.active:first"));
                reindexArrow();
                saveInputOrder()
            });

            $container.on ('click'  ,"span i.ui-icon-arrowthick-1-s",function(e){
                var $tr = $(this).closest("tr");
                $(this).parent().removeClass("ui-state-hover");
                $tr.insertAfter( $tr.nextAll("tr.active:first"));
                reindexArrow();
                saveInputOrder()
            });

            //----------------------------------------------
            // Gestion du select de module
            //-----------------------------------------------

            $container.find("[name^='_select']").change(function(){

               var side = ( this.name.split("_")[2] == "left" ? 0 : 1 );
               var component_name = $("[name='"+this.name+"'] :selected").attr("value");
               var free_panel = false;

                if(component_name == "panel")
                {
                    exit: for(var i=0 ; i<6 ; i++)
                    {
                        if(tab_panel[side][i] =='n')
                        {
                            component_name = "option-side_bar-"+this.name.split("_")[2]+"_bar-Panel_"+i+"-active";
                            free_panel = true;
                            break exit;
                        }
                    }


                }

                var closest = $container.find("[name='" + component_name + "']").closest("tr");
                closest.addClass("active").show().insertAfter( closest.nextAll("tr.active:last"));
                $container.find("select[name^='_select'] option[value='']").prop("selected" , true);

                if($container.find("[name='" + component_name + "']").prop("checked") == false)
                $container.find("[name='" + component_name + "']").trigger("click");

                reindexArrow();
                saveInputOrder()
            });

            //----------------------------------------------
            // Gestion du select du header
            //-----------------------------------------------


            HeaderSelect()

            $('select[name="option-title-element"]').change(function(){
                HeaderSelect()
            });


           function HeaderSelect()
           {
            if($('select[name="option-title-element"] :selected').attr("value") == "title")
            {
                $('input[name="option-title-url"]').closest("tr").hide();
                $('input[name="option-title-title_text"]').closest("tr").show();
                $('input[name="option-title-baseline_text"]').closest("tr").show();

            }
            else if($('select[name="option-title-element"] :selected').attr("value") == "image")
            {
                $('input[name="option-title-title_text"]').closest("tr").hide();
                $('input[name="option-title-baseline_text"]').closest("tr").hide();
                $('input[name="option-title-url"]').closest("tr").show();
            }
            else
            {
                $('input[name="option-title-url"]').closest("tr").show();
                $('input[name="option-title-title_text"]').closest("tr").show();
                $('input[name="option-title-baseline_text"]').closest("tr").show();
            }
           }

            function  reindexArrow()
            {
                $container.find("table").each(function(){
                    var $this = $(this).find("tr.active");

                    $(this).find("tr.first").removeClass("first");
                    $this.first().addClass("first");

                    $(this).find("tr.last").removeClass("last");
                    $this.last().addClass("last");
                });
            }

            function saveInputOrder()
            {
                var temp_string_left= "";
                var temp_string_right= "";

                var left = $container.find("table").first()
                var right = $container.find("table").last()

                left.find("tr.active").each(function(){

                    temp_string_left+= $(this).find("input").attr("name")+ "||";

                })
                temp_string_left = temp_string_left.substring(0,temp_string_left.length-2);

                right.find("tr.active").each(function(){

                    temp_string_right+= $(this).find("input").attr("name")+ "||";

                })
                temp_string_right = temp_string_right.substring(0,temp_string_right.length-2);

                $("input[type='hidden'][name='_input_hidden_left']").val(temp_string_left);
                $("input[type='hidden'][name='_input_hidden_right']").val(temp_string_right);

            }

            function loadInputOrder()
            {
              var temp_tab = new Array();
              temp_tab[0]= $("input[type='hidden'][name='_input_hidden_left']").val().split("||");
              temp_tab[1]=  $("input[type='hidden'][name='_input_hidden_right']").val().split("||");

              for(var i= 0 ; i<= 1 ; i++)
              {
                  for(var j= 0 ; j< temp_tab[i].length ; j++)
                  {
                      if(temp_tab[i][j] != "")
                      {
                          var closest = $("input[name='" + temp_tab[i][j] + "']").closest("tr");
                          var $checkbox = $("input[name='" + temp_tab[i][j] + "']");
                          closest.addClass("active").show().insertAfter( closest.nextAll("tr.active:last"))
                          if( ($("input[name='" + temp_tab[i][j] + "']").attr("name")).search("Panel") != -1)
                          {
                              console.log(findComponent("inputTitle" , "checkbox" ,$checkbox));
                          findComponent("label" , "checkbox" ,$checkbox).html(findComponent("inputTitle" , "checkbox" ,$checkbox).val());
                          findComponent("panelTitle" , "checkbox" ,$checkbox).html(findComponent("inputTitle" , "checkbox" ,$checkbox).val());
                          }
                      }
                  }
              }
            }


            function checkboxComponentAssoc($selector , $Component)
            {
                displayComponent($selector , $Component);
                $selector.click(function(){
                    displayComponent($selector , $Component);
                    if($selector.attr("name").search("Panel") != -1)
                    {
                        $Component.find("input").val("New Panel");
                        $selector.closest("tr").find("label").html("New Panel");
                    }
                });
            }

            function displayComponent($selector , $Component)
            {
                var num  =$selector.attr("name")[$selector.attr("name").length -8]
                var side = ($Component.find("input").attr("name") == $Component.parent().find("div").first().find("input").attr("name") ?  0 : 1);

                if($selector.is(":checked"))
                {
                    $Component.show();
                    tab_panel[side][num] = 'y';

                }
                else
                {
                    $Component.hide();
                    tab_panel[side][num] = 'n';
                }
            }

            function findComponent(type ,selectorType , $selector)
            {
                var name ;
                var num  ;
                var side ;

                name =  $selector.attr("name");

                switch(selectorType)
                {
                    case "inputTitle":
                        num  = name[ name.length -7];
                        side = (name[16] == 'l' ? "left" : "right");
                        break;
                    case "checkbox":

                        num  = name[ name.length -8];
                        side = (name[16] == 'l' ? "left" : "right");
                        break;
                }

                switch(type)
                {
                    case "panel":
                        if( side == "left")
                            return $("#"+$container.attr("id")+"_wysiwyg"+num+"").children("div").first();
                        else
                            return $("#"+$container.attr("id")+"_wysiwyg"+num+"").children("div").last();
                        break;
                    case "twitter":
                        if( side == "left")
                            return $("#"+$container.attr("id")+"_twitter").children("div").first();
                        else
                            return $("#"+$container.attr("id")+"_twitter").children("div").last();
                        break;
                    case "menu":
                        if( side == "left")
                            return $("#"+$container.attr("id")+"_menu").children("div").first();
                        else
                            return $("#"+$container.attr("id")+"_menu").children("div").last();
                        break;
                    case "social":
                        if( side == "left")
                            return $("#"+$container.attr("id")+"_social").children("div").first();
                        else
                            return $("#"+$container.attr("id")+"_social").children("div").last();
                        break;
                    case "label":
                        return $("#label_option-side_bar-"+side+"_bar-Panel_"+num+"-active");
                        break;
                    case "panelTitle":
                        if(selectorType == "inputTitle")
                            return  $selector.closest(".col.c6").find("h3 a");
                        else if(selectorType == "checkbox")
                        {
                            if( side == "left")
                                return $("#"+$container.attr("id")+"_wysiwyg"+num+"").children("div").first().find("h3 a");
                            else
                                return $("#"+$container.attr("id")+"_wysiwyg"+num+"").children("div").last().find("h3 a");
                        }
                        else return false;
                        break;
                    case "panelWysiwyg":
                        if(selectorType == "checkbox")
                        {
                            if( side == "left")
                                return $("#"+$container.attr("id")+"_wysiwyg"+num+"").children("div").first().find("[id*='content']");
                            else
                                return $("#"+$container.attr("id")+"_wysiwyg"+num+"").children("div").last().find("[id*='content']");
                        }
                        else return false;
                        break;
                    case "inputTitle":
                        return $("[name='option-side_bar-"+side+"_bar-Panel_"+num+"-title']");
                    break;
                    default :
                        return false
                    break;
                }


            }
        }

    }
);