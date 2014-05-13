/**
 * Created by dahan on 26/03/14.
 */

    $(document).ready(function(){

        $(document).foundation();

        $("button[id^='btn_swt_']").children("i").removeClass("glyphicon-collapse-down");
        $("button[id^='btn_swt_']").children("i").addClass("glyphicon-expand");
        $("button[id^='btn_swt_']").children("i").removeClass("switch_on");
        $("button[id^='btn_swt_']").parent().children("div").hide("slow");


        $("button[id^='btn_swt_']").click(function(){

            if( $(this).children("i").hasClass("switch_on"))
            {
                $(this).children("i").removeClass("glyphicon-collapse-down");
                $(this).children("i").addClass("glyphicon-expand");
                $(this).children("i").removeClass("switch_on");
                $(this).parent().children("div").hide("slow");
            }
            else
            {
                $(this).children("i").addClass("glyphicon-collapse-down");
                $(this).children("i").removeClass("glyphicon-expand");
                $(this).children("i").addClass("switch_on");
                $(this).parent().children("div").not("#div_custom").show("slow");

                if( $(this).parent().children("div").children("select").attr("id") == "select_Skin"
                    && $("#select_Skin :selected").attr("value") == "Custom")
                {
                    $("#div_custom").show("slow");
                }

            }



        });


        $(".optionbar_button").click(function(){


               if($("#optionbar").css("display") == "block")
               {



                   $("#optionbar").fadeOut("fast",function(){
                   });

                   $("#content").switchClass("large-offset-3 large-9" ,"large-12" ,1000, "easeInOutQuad" );

               }
                else
               {
                   $("#content").switchClass("large-12"  ,"large-offset-3 large-9" ,1000, "easeInOutQuad" );
                   $("#optionbar").fadeIn("fast");
               }

        });

    });

