/**
 * Created by dahan on 26/03/14.
 */

    $(document).ready(function(){


        $(".optionbar_button").click(function(){


               if($("#optionbar").css("display") == "block")
               {

                   $("#content").switchClass("col-md-offset-3 col-md-9" ,"col-md-12" ,1000, "easeInOutQuad" );

                   $("#optionbar").fadeOut("slow",function(){
                   /*$("#content").removeClass("col-md-10");
                   $("#content").removeClass("");
                   $("#content").addClass("col-md-12");*/


                   });

               }
                else
               {
                   $("#content").switchClass("col-md-12"  ,"col-md-offset-3 col-md-9" ,1000, "easeInOutQuad" );
                   $("#optionbar").fadeIn("slow");
               }

        });

    });

