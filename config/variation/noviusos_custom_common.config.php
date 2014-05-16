<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$uniqid = uniqid('template_e_');

return array(
    'admin' => array(
        'layout' => array(
            'content' => array(

            //-------------------------------------------
            // Blocs
            //-------------------------------------------


                "javascript"=> array(
                    'view' => 'noviusos_templates_e::admin/javascript',
                    'params' => array(
                        'uniqid' => $uniqid,
                    ),
                ),
                //-------------------------------------------
                // Configuration
                //-------------------------------------------

                'expander' => array(
                    'view' => 'nos::form/expander',
                    'params' => array(
                        'title'   => __('Configuration'),
                        'options' => array(
                            'allowExpand' => false,
                        ),
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'menus->principal->menu_id',
                                    'skin',
                                    'option-side_bar-position',
                                    'option-jumbotron-active'
                                ),
                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Jumbotron
                //-------------------------------------------

                'jumbotron' => array(
                    'view' => 'nos::form/expander',
                    'params' => array(
                        'title'   => __('Jumbotron'),
                        'options' => array(
                            'allowExpand' => false,
                        ),
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'option-jumbotron-title',
                                    'option-jumbotron-content',
                                    'option-jumbotron-button_title',
                                    'option-jumbotron-button_link',
                                ),
                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Left & right
                //-------------------------------------------


                'Side_bars' => array(
                    'view' => 'noviusos_templates_e::admin/layout',
                    'params' => array(
                        'uniqid' => $uniqid,
                        'left' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Left bar'),
                                'options' => array(
                                    'allowExpand' => false,

                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(

                                            'option-side_bar-left_bar-Panel_1-active',
                                            'option-side_bar-left_bar-Panel_2-active',
                                            'option-side_bar-left_bar-Panel_3-active',
                                            'option-side_bar-left_bar-Panel_4-active',
                                            'option-side_bar-left_bar-Panel_5-active',
                                            'option-side_bar-left_bar-Menu-active',
                                            'option-side_bar-left_bar-MenuId-active',
                                            'option-side_bar-left_bar-Time_line_Twitter-active',
                                            'option-side_bar-left_bar-Social-active',
                                            '_select_left',
                                            '_input_hidden_left'
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'right' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Right bar'),
                                'options' => array(
                                    'allowExpand' => false,

                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(

                                            'option-side_bar-right_bar-Panel_1-active',
                                            'option-side_bar-right_bar-Panel_2-active',
                                            'option-side_bar-right_bar-Panel_3-active',
                                            'option-side_bar-right_bar-Panel_4-active',
                                            'option-side_bar-right_bar-Panel_5-active',
                                            'option-side_bar-right_bar-Time_line_Twitter-active',
                                            'option-side_bar-right_bar-Social-active',
                                            'option-side_bar-right_bar-Menu-active',
                                            'option-side_bar-right_bar-MenuId-active',
                                            '_select_right',
                                            '_input_hidden_right'
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Modules
                //-------------------------------------------

                    //-------------------------------------------
                    // Panel 1
                    //-------------------------------------------


                'wysiwyg1' => array(
                    'view' => 'noviusos_templates_e::admin/layout',
                    'params' => array(
                        'uniqid' => $uniqid."_wysiwyg1",
                        'left' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Panel Left bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-left_bar-Panel_1-title',
                                            'option-side_bar-left_bar-Panel_1-content',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'right' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Panel Right bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-right_bar-Panel_1-title',
                                            'option-side_bar-right_bar-Panel_1-content',


                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Panel 2
                //-------------------------------------------

                'wysiwyg2' => array(
                    'view' => 'noviusos_templates_e::admin/layout',
                    'params' => array(
                        'uniqid' => $uniqid."_wysiwyg2",
                        'left' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Panel Left bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-left_bar-Panel_2-title',
                                            'option-side_bar-left_bar-Panel_2-content',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'right' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Panel Right bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-right_bar-Panel_2-title',
                                            'option-side_bar-right_bar-Panel_2-content',


                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Panel 3
                //-------------------------------------------

                'wysiwyg3' => array(
                    'view' => 'noviusos_templates_e::admin/layout',
                    'params' => array(
                        'uniqid' => $uniqid."_wysiwyg3",
                        'left' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Panel Left bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-left_bar-Panel_3-title',
                                            'option-side_bar-left_bar-Panel_3-content',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'right' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Panel Right bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-right_bar-Panel_3-title',
                                            'option-side_bar-right_bar-Panel_3-content',


                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),



                //-------------------------------------------
                // Panel 4
                //-------------------------------------------

                'wysiwyg4' => array(
                    'view' => 'noviusos_templates_e::admin/layout',
                    'params' => array(
                        'uniqid' => $uniqid."_wysiwyg4",
                        'left' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Panel Left bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-left_bar-Panel_4-title',
                                            'option-side_bar-left_bar-Panel_4-content',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'right' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Panel Right bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-right_bar-Panel_4-title',
                                            'option-side_bar-right_bar-Panel_4-content',


                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),



                //-------------------------------------------
                // Panel 5
                //-------------------------------------------

                'wysiwyg5' => array(
                    'view' => 'noviusos_templates_e::admin/layout',
                    'params' => array(
                        'uniqid' => $uniqid."_wysiwyg5",
                        'left' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Panel Left bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-left_bar-Panel_5-title',
                                            'option-side_bar-left_bar-Panel_5-content',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'right' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Panel Right bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-right_bar-Panel_5-title',
                                            'option-side_bar-right_bar-Panel_5-content',


                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Twitter time lines
                //-------------------------------------------

                '_twitter' => array(
                    'view' => 'noviusos_templates_e::admin/layout',
                    'params' => array(
                        'uniqid' => $uniqid."_twitter",
                        'left' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Twitter time line Left bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-left_bar-Time_line_Twitter-account_name',
                                            'option-side_bar-left_bar-Time_line_Twitter-tweet_limit'
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'right' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Twitter time line Right bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-right_bar-Time_line_Twitter-account_name',
                                            'option-side_bar-right_bar-Time_line_Twitter-tweet_limit'
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Menu
                //-------------------------------------------

                '_menu' => array(
                    'view' => 'noviusos_templates_e::admin/layout',
                    'params' => array(
                        'uniqid' => $uniqid."_menu",
                        'left' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Menu Left bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'menus->left->menu_id'
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'right' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Menu Right bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'menus->right->menu_id'
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),


                //-------------------------------------------
                // Social side bar
                //-------------------------------------------

                '_social' => array(
                    'view' => 'noviusos_templates_e::admin/layout',
                    'params' => array(
                        'uniqid' => $uniqid."_social",
                        'left' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Social Left bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-left_bar-Social-list_social-0-link',
                                            'option-side_bar-left_bar-Social-list_social-1-link',
                                            'option-side_bar-left_bar-Social-list_social-2-link',
                                            'option-side_bar-left_bar-Social-list_social-3-link',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        'right' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Social Right bar'),
                                'options' => array(
                                    'allowExpand' => true,
                                ),
                                'content' => array(
                                    'view' => 'nos::form/fields',
                                    'params' => array(
                                        'fields' => array(
                                            'option-side_bar-right_bar-Social-list_social-0-link',
                                            'option-side_bar-right_bar-Social-list_social-1-link',
                                            'option-side_bar-right_bar-Social-list_social-2-link',
                                            'option-side_bar-right_bar-Social-list_social-3-link',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),



                //-------------------------------------------
                // Social
                //-------------------------------------------


                'Social' => array(
                    'view' => 'nos::form/expander',
                    'params' => array(
                        'title'   => __('Social'),
                        'options' => array(
                            'allowExpand' => false,
                        ),
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'facebook',
                                    'twitter'
                                ),
                            ),
                        ),
                    ),
                ),


                //-------------------------------------------
                // Header
                //-------------------------------------------

                'Header' => array(
                    'view' => 'nos::form/expander',
                    'params' => array(
                        'title'   => __('Header'),
                        'options' => array(
                            'allowExpand' => false,
                        ),
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'option-title-element',
                                    'option-title-title_text',
                                    'option-title-baseline_text',
                                    'option-title-url',
                                ),
                            ),
                        ),
                    ),
                ),

                //-------------------------------------------
                // Footer
                //-------------------------------------------

                'Footer' => array(
                    'view' => 'nos::form/expander',
                    'params' => array(
                        'title'   => __('Footer'),
                        'options' => array(
                            'allowExpand' => false,
                        ),
                        'content' => array(
                            'view' => 'nos::form/fields',
                            'params' => array(
                                'fields' => array(
                                    'option-footer-text',
                                    'menus->footer->menu_id'
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'fields' => array(


        //-------------------------------------------
        // Components
        //-------------------------------------------


            //-------------------------------------------
            // Bloc Configuration
            //-------------------------------------------


            // Select Menu

            'menus->principal->menu_id' => array(
                'label' => __('Menu'),
                'renderer' => 'Nos\Renderer_Select_Model',
                'renderer_options' => array(
                    'model' => 'Nos\Menu\Model_Menu',
                ),
            ),

            // Select Skin

            'skin' => array(
                'label' => __('Skin'),
                'form' => array(
                    'type' => 'select',
                    'options' => array(
                        'Amelia'=> 'Amelia',
                        'Cerulean'=>'Cerulean',
                        'Custom'=>'Custom'    ,
                        'Cyborg'=>'Cyborg'    ,
                        'Mineral'=>'Mineral'  ,
                        'Nature'=>'Nature'    ,
                        'Penciled'=>'Penciled',
                        'Polaire'=>'Polaire'  ,
                        'Slate'=>'Slate'     ,
                        'Tonal blue'=>'Tonal blue',
                        'United'=>'United'
                    ),
                ),
            ),

            // Select position Side bar

            'option-side_bar-position' => array(
                'label' => __('Side bar'),
                'form' => array(
                    'type' => 'select',
                    'options' => array(
                        'both' => __('Both'),
                        'right' => __('Right'),
                        'left' => __('Left'),
                        'none' => __('None')
                    ),
                ),
            ),

            // Checkbox jumbotron

            'option-jumbotron-active' => array(
                'label' => __('Jumbotron'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            //-------------------------------------------
            // Jumbotron
            //-------------------------------------------

            // Input text title jumbotron

            'option-jumbotron-title' => array(
                'label' => __('Title'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Wysiwyg content jumbotron


            'option-jumbotron-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),

            // Input text title button jumbotron

            'option-jumbotron-button_title' => array(
                'label' => __('Button title'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Input text link button jumbotron

            'option-jumbotron-button_link' => array(
                'label' => __('Button link'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            //-------------------------------------------
            // Right bar
            //-------------------------------------------

            // Checkbox panel 1 Right

            'option-side_bar-right_bar-Panel_1-active' => array(
                'label' => __('Panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            // Checkbox panel 2 Right

            'option-side_bar-right_bar-Panel_2-active' => array(
                'label' => __('Panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'


                ),
            ),

            // Checkbox panel 3 Right

            'option-side_bar-right_bar-Panel_3-active' => array(
                'label' => __('Panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'


                ),
            ),

            // Checkbox panel 4 Right

            'option-side_bar-right_bar-Panel_4-active' => array(
                'label' => __('Panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'


                ),
            ),

            // Checkbox panel 5 Right

            'option-side_bar-right_bar-Panel_5-active' => array(
                'label' => __('Panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'


                ),
            ),


            // Checkbox Twitter time line Right

            'option-side_bar-right_bar-Time_line_Twitter-active' => array(
                'label' => __('Twitter'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            // Checkbox Social Right

            'option-side_bar-right_bar-Social-active' => array(
                'label' => __('Social'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),


            // Checkbox Menu Right

            'option-side_bar-right_bar-MenuId-active' => array(
                'label' => __('Menu'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            // Select modules Right

            '_select_right' => array(
                'label' => __(''),
                'form' => array(
                    'type' => 'select',
                    'options' => array(
                        '' => __('Add a component'),
                        'panel' => __('Panel'),
                        'option-side_bar-right_bar-Social-active' => __('Social'),
                        'option-side_bar-right_bar-Time_line_Twitter-active' => __('Twitter'),
                        'option-side_bar-right_bar-MenuId-active' => __('Menu'),

                    ),
                ),
            ),


            // Hidden list and order of modules Right

            '_input_hidden_right'=> array(
                'label' => __(''),
                'form' => array(
                    'type' => 'hidden'
                )
            ),


            //-------------------------------------------
            // Left bar
            //-------------------------------------------

            // Checkbox panel 1 Left

            'option-side_bar-left_bar-Panel_1-active' => array(
                'label' => __('Panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            // Checkbox panel 2 Left

            'option-side_bar-left_bar-Panel_2-active' => array(
                'label' => __('Panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            // Checkbox panel 3 Left

            'option-side_bar-left_bar-Panel_3-active' => array(
                'label' => __('Panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            // Checkbox panel 4 Left

            'option-side_bar-left_bar-Panel_4-active' => array(
                'label' => __('Panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            // Checkbox panel 5 Left

            'option-side_bar-left_bar-Panel_5-active' => array(
                'label' => __('Panel'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),


            // Checkbox Twitter time line Left

            'option-side_bar-left_bar-Time_line_Twitter-active' => array(
                'label' => __('Twitter'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            // Checkbox Menu Left

            'option-side_bar-left_bar-MenuId-active' => array(
                'label' => __('Menu'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            // Checkbox Social Left

            'option-side_bar-left_bar-Social-active' => array(
                'label' => __('Social'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            // Select modules Left

            '_select_left' => array(
                'label' => __(''),
                'form' => array(
                    'type' => 'select',
                    'options' => array(
                        '' => __('Add a component'),
                        'panel' => __('Panel '),
                        'option-side_bar-left_bar-Social-active' => __('Social'),
                        'option-side_bar-left_bar-Time_line_Twitter-active' => __('Twitter'),
                        'option-side_bar-left_bar-MenuId-active' => __('Menu'),

                    ),
                ),
            ),

            // Hidden list and order of modules Left

            '_input_hidden_left'=> array(
                'label' => __(''),
                'form' => array(
                    'type' => 'hidden'
                )
            ),


            //-------------------------------------------
            // Bloc Social
            //-------------------------------------------


            // Input text Facebook account

            'facebook' => array(
                'label' => __('Facebook Account'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Input text Twitter account

            'twitter' => array(
                'label' => __('Twitter Account'),
                'form' => array(
                    'type' => 'text'

                ),
            ),


            //-------------------------------------------
            // Bloc Header
            //-------------------------------------------


            // select header title configuration

            'option-title-element' => array(
                'label' => __('Navigation bar'),
                'form' => array(
                    'type' => 'select',
                    'options' => array(
                        'both' => __('Both'),
                        'image' => __('Image'),
                        'title' => __('Title'),
                    ),
                ),
            ),

            // input text Site title

            'option-title-title_text' => array(
                'label' => __('Site title'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // input text Site baseline

            'option-title-baseline_text' => array(
                'label' => __('Baseline'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // input text header image url

            'option-title-url' => array(
                'label' => __('Image URL'),
                'form' => array(
                    'type' => 'text'

                ),
            ),




            //-------------------------------------------
            // Bloc Footer
            //-------------------------------------------


            // Wysiwyg footer

            'option-footer-text'=> array(
                'label' => __('Footer Text'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),


            // Menu footer

            'menus->footer->menu_id' => array(
                'label' => __('Menu'),
                'renderer' => 'Nos\Renderer_Select_Model',
                'renderer_options' => array(
                    'model' => 'Nos\Menu\Model_Menu',
                ),
            ),


            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++//
            //                                                       //
            //                        MODULES                        //
            //                                                       //
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++//

        //-------------------------------------------
        // Modules Left
        //-------------------------------------------

            //-------------------------------------------
            // Modules Panel 1 Left
            //-------------------------------------------

            // Input text header Panel 1

            'option-side_bar-left_bar-Panel_1-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Wysiwyg content Panel 1

            'option-side_bar-left_bar-Panel_1-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),


            //-------------------------------------------
            // Modules Panel 2 Left
            //-------------------------------------------


            // Input text header Panel 2

            'option-side_bar-left_bar-Panel_2-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Wysiwyg content Panel 2

            'option-side_bar-left_bar-Panel_2-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),


            //-------------------------------------------
            // Modules Panel 3 Left
            //-------------------------------------------


            // Input text header Panel 3

            'option-side_bar-left_bar-Panel_3-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Wysiwyg content Panel 3

            'option-side_bar-left_bar-Panel_3-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),


            //-------------------------------------------
            // Modules Panel 4 Left
            //-------------------------------------------


            // Input text header Panel 4

            'option-side_bar-left_bar-Panel_4-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Wysiwyg content Panel 4

            'option-side_bar-left_bar-Panel_4-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),


            //-------------------------------------------
            // Modules Panel 5 Left
            //-------------------------------------------


            // Input text header Panel 5

            'option-side_bar-left_bar-Panel_5-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Wysiwyg content Panel 5

            'option-side_bar-left_bar-Panel_5-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),


            //-------------------------------------------
            // Twitter time line Left
            //-------------------------------------------


            'option-side_bar-left_bar-Time_line_Twitter-account_name' => array(
                'label' => __('Account name'),
                'form' => array(
                    'type' => 'text',
                    'value' => 'NoviusOS'

                ),
            ),

            'option-side_bar-left_bar-Time_line_Twitter-tweet_limit' => array(
                'label' => __('Tweet limit'),
                'form' => array(
                    'type' => 'text',
                    'value' => '100'

                ),
            ),

            //-------------------------------------------
            // Menu Left
            //-------------------------------------------
            'menus->left->menu_id' => array(
                'label' => __('Menu'),
                'renderer' => 'Nos\Renderer_Select_Model',
                'renderer_options' => array(
                    'model' => 'Nos\Menu\Model_Menu',
                ),
            ),

            //-------------------------------------------
            //  Social Left
            //-------------------------------------------


            // Input text Facebook account

            'option-side_bar-left_bar-Social-list_social-0-link' => array(
                'label' => __('Facebook link'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Input text Twitter account

            'option-side_bar-left_bar-Social-list_social-1-link' => array(
                'label' => __('Twitter link'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Input text google+ account

            'option-side_bar-left_bar-Social-list_social-2-link' => array(
                'label' => __('Google+ link'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Input text github account

            'option-side_bar-left_bar-Social-list_social-3-link' => array(
                'label' => __('Github link'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

        //-------------------------------------------
        // Modules Right
        //-------------------------------------------

            //-------------------------------------------
            // Modules Panel 1 Right
            //-------------------------------------------

            // Input text header Panel 1

            'option-side_bar-right_bar-Panel_1-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Wysiwyg content Panel 1

            'option-side_bar-right_bar-Panel_1-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),


            //-------------------------------------------
            // Modules Panel 2 Right
            //-------------------------------------------

            // Input text header Panel 2

            'option-side_bar-right_bar-Panel_2-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Wysiwyg content Panel 2


            'option-side_bar-right_bar-Panel_2-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),


            //-------------------------------------------
            // Modules Panel 3 Right
            //-------------------------------------------

            // Input text header Panel 3

            'option-side_bar-right_bar-Panel_3-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Wysiwyg content Panel 3


            'option-side_bar-right_bar-Panel_3-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),



            //-------------------------------------------
            // Modules Panel 4 Right
            //-------------------------------------------

            // Input text header Panel 4

            'option-side_bar-right_bar-Panel_4-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Wysiwyg content Panel 4


            'option-side_bar-right_bar-Panel_4-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),



            //-------------------------------------------
            // Modules Panel 5 Right
            //-------------------------------------------

            // Input text header Panel 5

            'option-side_bar-right_bar-Panel_5-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Wysiwyg content Panel 5


            'option-side_bar-right_bar-Panel_5-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),

            //-------------------------------------------
            // Twitter time line Right
            //-------------------------------------------


            'option-side_bar-right_bar-Time_line_Twitter-account_name' => array(
                'label' => __('Account name'),
                'form' => array(
                    'type' => 'text',
                    'value' => 'NoviusOS'

                ),
            ),

            'option-side_bar-right_bar-Time_line_Twitter-tweet_limit' => array(
                'label' => __('Tweet limit'),
                'form' => array(
                    'type' => 'text',
                    'value' => '100'

                ),
            ),

            //-------------------------------------------
            // Menu Right
            //-------------------------------------------
            'menus->right->menu_id' => array(
                'label' => __('Menu'),
                'renderer' => 'Nos\Renderer_Select_Model',
                'renderer_options' => array(
                    'model' => 'Nos\Menu\Model_Menu',
                ),
            ),


            //-------------------------------------------
            //  Social Right
            //-------------------------------------------


            // Input text Facebook account

            'option-side_bar-right_bar-Social-list_social-0-link' => array(
                'label' => __('Facebook link'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Input text Twitter account

            'option-side_bar-right_bar-Social-list_social-1-link' => array(
                'label' => __('Twitter link'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Input text google+ account

            'option-side_bar-right_bar-Social-list_social-2-link' => array(
                'label' => __('Google+ link'),
                'form' => array(
                    'type' => 'text'

                ),
            ),

            // Input text github account

            'option-side_bar-right_bar-Social-list_social-3-link' => array(
                'label' => __('Github link'),
                'form' => array(
                    'type' => 'text'

                ),
            ),



        ),
    ),
);








