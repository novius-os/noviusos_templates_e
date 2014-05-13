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

                "javascript"=> array(
                    'view' => 'noviusos_templates_e::admin/javascript',
                    'params' => array(
                        'uniqid' => $uniqid,
                    ),
                ),
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


                'wysiwyg1' => array(
                    'view' => 'noviusos_templates_e::admin/layout',
                    'params' => array(
                        'uniqid' => $uniqid."_wysiwyg1",
                        'left' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Panel 1 Left bar'),
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
                                'title'   => __('Panel 1 Right bar'),
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

                'wysiwyg2' => array(
                    'view' => 'noviusos_templates_e::admin/layout',
                    'params' => array(
                        'uniqid' => $uniqid."_wysiwyg2",
                        'left' => array(
                            'view' => 'nos::form/expander',
                            'params' => array(
                                'title'   => __('Panel 2 Left bar'),
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
                                'title'   => __('Panel 2 Right bar'),
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
                                    'option-footer-text'
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'fields' => array(
            'menus->principal->menu_id' => array(
                'label' => __('Menu'),
                'renderer' => 'Nos\Renderer_Select_Model',
                'renderer_options' => array(
                    'model' => 'Nos\Menu\Model_Menu',
                ),
            ),
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
            'option-jumbotron-active' => array(
                'label' => __('Jumbotron'),
                'form' => array(
                    'type' => 'hidden',

                ),
            ),
            'option-side_bar-right_bar-Panel_1-active' => array(
                'label' => __('Panel 1'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),
            'option-side_bar-right_bar-Panel_2-active' => array(
                'label' => __('Panel 2'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'


                ),
            ),
            'option-side_bar-right_bar-Time_line_Twitter-active' => array(
                'label' => __('Twitter'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),
            'option-side_bar-right_bar-Social-active' => array(
                'label' => __('Social'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            'option-side_bar-right_bar-Menu-active' => array(
                'label' => __('Menu'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'


                ),
            ),
            'option-side_bar-right_bar-MenuId-active' => array(
                'label' => __('Menu Id'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            'option-side_bar-left_bar-Panel_1-active' => array(
                'label' => __('Panel 1'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),
            'option-side_bar-left_bar-Panel_2-active' => array(
                'label' => __('Panel 2'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),
            'option-side_bar-left_bar-Menu-active' => array(
                'label' => __('Menu'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'


                ),
            ),
            'option-side_bar-left_bar-Time_line_Twitter-active' => array(
                'label' => __('Twitter'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),
            'option-side_bar-left_bar-MenuId-active' => array(
                'label' => __('Menu Id'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),
            'option-side_bar-left_bar-Social-active' => array(
                'label' => __('Social'),
                'form' => array(
                    'type' => 'checkbox',
                    'value' => 'y'

                ),
            ),

            'facebook' => array(
                'label' => __('Facebook Account'),
                'form' => array(
                    'type' => 'text'

                ),
            ),
            'twitter' => array(
                'label' => __('Twitter Account'),
                'form' => array(
                    'type' => 'text'

                ),
            ),
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
            'option-title-title_text' => array(
                'label' => __('Site title'),
                'form' => array(
                    'type' => 'text'

                ),
            ),
            'option-title-baseline_text' => array(
                'label' => __('Baseline'),
                'form' => array(
                    'type' => 'text'

                ),
            ),
            'option-title-url' => array(
                'label' => __('Image URL'),
                'form' => array(
                    'type' => 'text'

                ),
            ),
            'option-footer-text'=> array(
                'label' => __('Footer Text'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),

            '_select_left' => array(
                'label' => __(''),
                'form' => array(
                    'type' => 'select',
                    'options' => array(
                        '' => __('Add a component'),
                        'option-side_bar-left_bar-Panel_1-active' => __('Panel 1'),
                        'option-side_bar-left_bar-Panel_2-active' => __('Panel 2'),
                        'option-side_bar-left_bar-Social-active' => __('Social'),
                        'option-side_bar-left_bar-Time_line_Twitter-active' => __('Twitter'),
                        'option-side_bar-left_bar-Menu-active' => __('Menu'),
                        'option-side_bar-left_bar-MenuId-active' => __('Menu Id'),

                    ),
                ),
            ),

            '_select_right' => array(
                'label' => __(''),
                'form' => array(
                    'type' => 'select',
                    'options' => array(
                        '' => __('Add a component'),
                        'option-side_bar-right_bar-Panel_1-active' => __('Panel 1'),
                        'option-side_bar-right_bar-Panel_2-active' => __('Panel 2'),
                        'option-side_bar-right_bar-Social-active' => __('Social'),
                        'option-side_bar-right_bar-Time_line_Twitter-active' => __('Twitter'),
                        'option-side_bar-right_bar-Menu-active' => __('Menu'),
                        'option-side_bar-right_bar-MenuId-active' => __('Menu Id'),

                    ),
                ),
            ),

            '_input_hidden_right'=> array(
                'label' => __(''),
                'form' => array(
                    'type' => 'hidden'
                )
            ),

            '_input_hidden_left'=> array(
                'label' => __(''),
                'form' => array(
                    'type' => 'hidden'
                )
            ),

            'option-side_bar-left_bar-Panel_1-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),
            'option-side_bar-right_bar-Panel_1-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),
            'option-side_bar-left_bar-Panel_2-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),
            'option-side_bar-right_bar-Panel_2-title' => array(
                'label' => __('Header'),
                'form' => array(
                    'type' => 'text'

                ),
            ),
            'option-side_bar-left_bar-Panel_1-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),
            'option-side_bar-left_bar-Panel_2-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),
            'option-side_bar-right_bar-Panel_1-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),
            'option-side_bar-right_bar-Panel_2-content' => array(
                'label' => __('Content'),
                'renderer' => 'Nos\Renderer_Wysiwyg',
                'renderer_options' => array(
                ),
            ),



        ),
    ),
);








