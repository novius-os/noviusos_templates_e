<?php

    $iscmd ="10"; //int_size_content medium
    $iscsm ="12"; //int_size_content small
    $isic = "12";//int_size_inner_content
    $ioc = "col-md-offset-1 col-sm-offset-1 "; //int_offset_content
    $ioic = "" ;//int_offset_inner_content
    $str_left_menu = "";
    $str_right_menu = "";


    switch($config['option']['side_bar']['position'])
    {
        case "left":

            $iscmd = "8";
            $isic = "12";
            $str_left_menu = side_bar("left" ,$config);
            $ioic = "";
            $ioc = "";
            break;
        case "right":
            $iscmd = "8";
            $isic = "12";
            $str_right_menu = side_bar("right",$config);
            $ioic = "";
            break;
        case "both":
            $iscmd = "6";
            $isic = "12";
            $ioic = "";
            $ioc = "";
            $str_left_menu = side_bar("left",$config);
            $str_right_menu = side_bar("right",$config);
            break;
        case "none":
            break;

    }

    if($config['option']['side_bar']['priority'] == "left" || $config['option']['side_bar']['priority'] == "right" )
    {
        $iscsm = "9";
    }

    $str_class_content = "$ioc col-md-$iscmd col-sm-$iscsm col-xs-12";
    $str_class_inner_content ="$ioic col-md-$isic col-sm-$isic col-xs-$isic";




?>
<div class="row" style="padding-right: 15px ; padding-left: 15px ; margin : 0">
     <?=$str_left_menu ?>
     <div class="<?=$str_class_content?>" >

        <div class="<?=$str_class_inner_content?>">
            <div class="row">
                <?php if($config["option"]["jumbotron"]["active"] =="y"){?>
                <div class="jumbotron">
                    <div class="container">
                        <h1><?=$config["option"]["jumbotron"]["title"] ?></h1>
                        <p><?=$config["option"]["jumbotron"]["content"] ?></p>
                        <a href="<?=$config["option"]["jumbotron"]["button_link"] ?>" class="btn btn-primary btn-lg"><?=$config["option"]["jumbotron"]["button_title"] ?></a>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
        <div class="row"><h1 id="pagename"><?= $title ?></h1>
            <?= $wysiwyg['content'] ?>
        </div>
        <br>
     </div>

        <?=$str_right_menu ?>

</div>


