<?php
/**
 * Created by PhpStorm.
 * User: dahan
 * Date: 15/05/14
 * Time: 09:56
 */

?>

<style>

    .nav > li > div {
        position: relative;
        display: block;
        padding: 10px 15px;
        text-align: left;
        padding-bottom: 5px;
        padding-top: 5px;
    }
</style>

<?php



$items = $menu->branch();

if (count($items)) {
    ?>
    <ul <?= ( isset($class) ? "class=' ".$class." ' " : "" )?> <?=(isset($id) ? "id='".$id."'" : "" )?> >
    <?php
    foreach ($items as $item) {
        echo '<li class="lvl0">', $item->html(array("class" => ""));
        $subitems = $menu->branch($item);
        if (count($subitems)) {
            echo '<ul class="nav nav-pills nav-stacked" style="text-indent: 20px">';
            foreach ($subitems as $si) {
                echo '<li class="lvl0 ">', $si->html(array("class" => ""));
                $subsubitems = $menu->branch($si);
                if (count($subsubitems)) {
                    echo '<ul class="nav nav-pills nav-stacked" style="text-indent: 40px">';
                    foreach ($subsubitems as $ssi) {
                        echo '<li class="lvl1">', $ssi->html(array("class" => "")), '</li>';
                    }
                    echo '</ul>';
                }
            }
            echo '</ul>';
        }
        echo '</li>';
    }

    /*if($config["language"] == "y")
    {
        // Display a switch to others contexts home page
        $contexts = \Nos\Tools_Context::contexts();
        $links = array();
        $links[] = '<li class="dropdown"><a href="'.\Nos\Tools_Url::context($current_context).'"  data-toggle="dropdown" class="dropdown-toggle" >'.\Nos\Tools_Context::contextLabel($current_context).'<b class="caret"></b></a><ul class="dropdown-menu">';

        foreach (array_keys($contexts) as $i => $context) {
            if ($context === $current_context) {
                continue;
            }
            $links[] = '<li><a href="'.\Nos\Tools_Url::context($context).'">'.\Nos\Tools_Context::contextLabel($context).'</a></li>';
        }
        if (!empty($links)) {
            echo  implode(' ', $links);
        }
        echo '</ul></li>';
    }*/

    echo '</ul>';
}

?>
