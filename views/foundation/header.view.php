<?php


$str_img = "<p class='image'> <img src=\"" . $config['option']['title']['url'] . "\"></p>";
$str_img_small = "<span class='image_small'> <img src=\"" . $config['option']['title']['url'] . "\"></span>";
$str_title_small = "<span class='title_small'>" . $sitename . "</span>";
$str_title = "<span style='font-size: 20px ; line-height : 20px'>" . $sitename . "</span><br>";
$str_baseline = "<span style='font-size: 13px'>" . $config['option']['title']["baseline_text"] . "</span>";
$id_text = "title";
$top = "-50px";

switch ($config['option']['title']['element']) {
    case "text":
        $str_img = "<!--<img src='img/trombone.png'>-->";
        $id_text = "titleonly";
        $str_img_small = "";
        $str_title_small = "<span class='title_small_only'>" . $config['option']['title']["title_text"] . "</span>";
        break;
    case "image":
        $str_title = "";
        $str_title_small = "";
        break;
    case "both":
        break;
}


$path_img = "static/apps/noviusos_templates_custom/img/";


$depth = 2;
if ($depth > 0) {
    $pages = array();
    $pages = findPages($config['option']['header_menu']['page_id']);
    $current = \Nos\Nos::main_controller()->getPage()->page_id;

    if (count($pages)) {

        ?>



        <header>
        <div class="large-12">
            <nav class="top-bar" data-topbar>
                <ul class="title-area">
                    <li class="name">
                        <a id="sitename"
                           href="<?= \Nos\Tools_Url::context(\Nos\Nos::main_controller()->getPage()->get_context()); ?>"><?= $str_img_small ?><?= $str_title_small ?></a>
                        <?php if ($config['option']['header_menu']['active'] == "y"){
                        $top = "-50";
                        ?>
                    </li>
                    <li class="toggle-topbar menu-icon">
                        <a>Menu</a>
                    </li>
                    <?php } ?>
                 </ul>
        <?php if ($config['option']['header_menu']['active'] == "y") { ?>
            <section class="top-bar-section div-menu-top-bar ">
            <ul id="" class="right">
            <?php
            foreach ($pages as $p) {


                if ($depth > 1 && count(findPages($p['id'])) != 0) {
                    $anchor = array('text' => e($p->pick('menu_title', 'title')) . " <b class='caret'></b>");

                } else
                    $anchor = array('text' => e($p->pick('menu_title', 'title')));

                $current == $p['id'] && $anchor['class'] = 'active ' . ($depth > 1 ? " has-dropdown" : "");
                echo '<li class="lvl0' . ($current == $p['id'] ? " active " : "") . ($depth > 1 && count(findPages($p['id'])) ? " has-dropdown" : "") . '">', $p->htmlAnchor($anchor);
                if ($depth > 1) {
                    $subpages = findPages($p['id']);
                    if (count($subpages)) {
                        echo '<ul class="dropdown">';
                        foreach ($subpages as $sp) {
                            $anchor = array('text' => e($sp->pick('menu_title', 'title')));
                            $current == $sp['id'] && $anchor['class'] = 'active';
                            echo '<li class="lvl1">', $sp->htmlAnchor($anchor), '</li>';
                        }
                        echo '</ul>';
                    }
                }
                echo '</li>';
            }

            if ($config["language"] == "y") {
                // Display a switch to others contexts home page
                $contexts = \Nos\Tools_Context::contexts();
                $links = array();
                $links[] = '<li class="has-dropdown"><a href="' . \Nos\Tools_Url::context($current_context) . '" >' . \Nos\Tools_Context::contextLabel($current_context) . '<b class="caret"></b></a><ul class="dropdown">';

                foreach (array_keys($contexts) as $i => $context) {
                    if ($context === $current_context) {
                        continue;
                    }
                    $links[] = '<li><a href="' . \Nos\Tools_Url::context($context) . '">' . \Nos\Tools_Context::contextLabel($context) . '</a></li>';
                }
                if (!empty($links)) {
                    echo implode(' ', $links);
                }
                echo '</ul></li>';
            }
            echo '</ul>';
        }
    }?>
    </ul>
<?php } ?>
    </section>

    </nav>


    <div class="nav-logo" style="top :<?= $top ?>">
        <a href="#">
            <?= $str_img ?>
            <p class="<?= $id_text ?>">
                <?= $str_title ?>
                <?= $str_baseline ?>
            </p>
        </a>
    </div>

    </div>
</header>



<?php
/**
 * @param null $idParent
 * @return array|\Nos\Page\Model_Page|\Nos\Page\Model_Page[]
 */

function findPages($idParent = null)
{
    $where = array(
        'page_parent_id' => $idParent,
        'published' => 1,
        'page_menu' => 1,
        'page_context' => \Nos\Nos::main_controller()->getPage()->page_context,
    );

    $pages = \Nos\Page\Model_Page::find('all', array(
        'where' => $where,
        'order_by' => array('page_sort' => 'asc')
    ));

    if (count($pages) > 0) {
        return $pages;
    } else {
        return array();
    }
}
