<?php
return array (
  'theme_name' => 'bootstrap',
  'skin' => 'Custom',
  'css_default' => 'Style.scss',
  'function_file' => 'fonctions.view.php',
  'language' => 'n',
  'option_bar' => 'y',
  'facebook' => 'https://www.facebook.com/noviusfr',
  'twitter' => 'https://twitter.com/NoviusOS',
  'google-plus' => '',
  'github' => '',
  'option' => 
  array (
    'header_menu' => 
    array (
      'active' => 'y',
      'page_id' => '5',
    ),
    'jumbotron' => 
    array (
      'title' => 'Hello world!',
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam gravida libero vel magna cursus semper.',
      'button_title' => 'Learn more',
      'button_link' => '#',
    ),
    'side_bar' => 
    array (
      'position' => 'both',
      'priority' => 'left',
      'right_bar' => 
      array (
        'Social' => 
        array (
          'type' => 'social',
          'active' => 'y',
          'list_social' => 
          array (
            0 => 
            array (
              'name' => 'facebook',
              'link' => '#',
              'text' => 'Facebook',
            ),
            1 => 
            array (
              'name' => 'twitter',
              'link' => '#',
              'text' => 'Twitter',
            ),
            2 => 
            array (
              'name' => 'google-plus',
              'link' => '#',
              'text' => 'Google+',
            ),
            3 => 
            array (
              'name' => 'github',
              'link' => '#',
              'text' => 'Github',
            ),
          ),
        ),
        'Time_line_Twitter' => 
        array (
          'type' => 'twitterTL',
          'active' => 'y',
          'account_name' => '#',
          'tweet_limit' => '100',
          'text' => 'Tweets',
        ),
        'Panel_1' => 
        array (
          'type' => 'panel',
          'active' => 'n',
          'title' => 'Me contacter :',
          'content' => '0678452101 Robert.machin@gmail.com ',
        ),
        'Panel_2' => 
        array (
          'type' => 'panel',
          'active' => 'n',
          'title' => 'Prochaine réunion :',
          'content' => 'Mercredi 18 décembre à 18h30 salle des marmottes',
        ),
      ),
      'left_bar' => 
      array (
        'MenuId' => 
        array (
          'type' => 'menu_id',
          'active' => 'y',
          'page_id' => NULL,
        ),
        'Menu' => 
        array (
          'type' => 'menu',
          'active' => 'n',
          'menu_list' => 
          array (
            0 => 
            array (
              'title' => 'Start Bootstrap',
              'link' => '#',
            ),
            1 => 
            array (
              'title' => 'Dashboard',
              'link' => '#',
            ),
            2 => 
            array (
              'title' => 'Shortcut',
              'link' => '#',
            ),
            3 => 
            array (
              'title' => 'Overview',
              'link' => '#',
            ),
            4 => 
            array (
              'title' => 'Events',
              'link' => '#',
            ),
            5 => 
            array (
              'title' => 'About',
              'link' => '#',
            ),
            6 => 
            array (
              'title' => 'Services',
              'link' => '#',
            ),
            7 => 
            array (
              'title' => 'Contact',
              'link' => '#',
            ),
          ),
        ),
        'Panel_1' => 
        array (
          'type' => 'panel',
          'active' => 'n',
          'title' => 'Boutique',
          'content' => 'N\'oubliez pas d\'acheter nos nouveaux produit !',
        ),
        'Time_line_Twitter' => 
        array (
          'type' => 'twitterTL',
          'active' => 'n',
          'account_name' => 'Noviusinfo',
          'tweet_limit' => '100',
          'text' => 'Tweets',
        ),
      ),
    ),
    'title' => 
    array (
      'element' => 'both',
      'url' => 'static/apps/noviusos_templates_e/img/novius.png',
      'title_text' => 'TemplateDeclinaison.com',
      'baseline_text' => 'Le template declinable',
    ),
    'footer' => 
    array (
      'text' => 'Cover template for Novius OS',
    ),
  ),
);
