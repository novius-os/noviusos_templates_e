
define(
    [
        'jquery-nos'
    ],
    function($) {
        "use strict";
        return function($container) {


            $container.find("select[name^='_select'] option[value='']").prop("selected" , true)

            $container.find("input[type='checkbox']").css("display" , "none")

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


                $container.find("input[type='checkbox'][name*='Panel']").each(function(){
                    showPanelConfig(this);
                });
            });


            $container.find("input[type='checkbox'][name*='Panel']").each(function(){
                showPanelConfig(this);
            });



            $container.find("input[type='checkbox'][name*='Panel']").click(function(){
                showPanelConfig(this);
            });


            $container.find("input[name^='option-side_bar'][type='checkbox']").parent()
                .append("<button class='suppr' type='button' style='float:right; margin-left:5px;'>x</button>"
                    +"<span style='float:right;'><i class='icon ui-icon ui-icon-arrowthick-1-s'></i></span>"
                    +"<span style='float:right;'><i class='icon ui-icon ui-icon-arrowthick-1-n'></i></span>")
                .closest("tr").hide();

            loadInputOrder();
            reindexArrow();

            $container.on('click' , "button.suppr", function(){
                var $tr = $(this).closest("tr");
                $tr.find("input").prop("checked" , false);
                $tr.hide();
                $tr.removeClass("active");
                reindexArrow();
                saveInputOrder()

                $container.find("input[type='checkbox'][name*='Panel']").each(function(){
                    showPanelConfig(this);
                });

            });

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

            $container.find("[name^='_select']").change(function(){

               var component_name = $("[name='"+this.name+"'] :selected").attr("value");
                var closest = $container.find("[name='" + component_name + "']").closest("tr");
                closest.addClass("active").show().insertAfter( closest.nextAll("tr.active:last"));
                $container.find("select[name^='_select'] option[value='']").prop("selected" , true);

                if($container.find("[name='" + component_name + "']").prop("checked") == false)
                $container.find("[name='" + component_name + "']").trigger("click");

                reindexArrow();
                saveInputOrder()



            });


            $('select[name="option-title-element"]').change(function(){
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
        });



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
                      var closest = $("input[name='" + temp_tab[i][j] + "']").closest("tr");
                      closest.addClass("active").show().insertAfter( closest.nextAll("tr.active:last"))
                  }
              }
            }

            function showPanelConfig(component)
            {
                var tab_temp = $(component).attr("name").split("-");

                if(tab_temp[3] == "Panel_1")
                {
                    if(tab_temp[2] == "left_bar")
                    {
                        if($(component).is(":checked"))
                        {
                            $("#"+$container.attr("id")+"_wysiwyg1").children("div").first().show();
                        }
                        else
                        {
                            $("#"+$container.attr("id")+"_wysiwyg1").children("div").first().hide();
                        }
                    }
                    else
                    {
                        if($(component).is(":checked"))
                        {
                            $("#"+$container.attr("id")+"_wysiwyg1").children("div").last().show();
                        }
                        else
                        {
                            $("#"+$container.attr("id")+"_wysiwyg1").children("div").last().hide();
                        }
                    }
                }
                else
                {

                    if(tab_temp[2] == "left_bar")
                    {
                        if($(component).is(":checked"))
                        {
                            $("#"+$container.attr("id")+"_wysiwyg2").children("div").first().show();
                        }
                        else
                        {
                            $("#"+$container.attr("id")+"_wysiwyg2").children("div").first().hide();
                        }
                    }
                    else
                    {
                        if($(component).is(":checked"))
                        {
                            $("#"+$container.attr("id")+"_wysiwyg2").children("div").last().show();
                        }
                        else
                        {
                            $("#"+$container.attr("id")+"_wysiwyg2").children("div").last().hide();
                        }
                    }

                }
            }






        }




    }
);