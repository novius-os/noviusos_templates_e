/**
 * Created by dahan on 26/03/14.
 */

    $(document).ready(function(){

        $(document).foundation();

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

