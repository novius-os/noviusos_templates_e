<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

return array(
    'name'    => 'Novius OS Custom E',
    'version' => '4.1 (Dubrovka)',
    'provider' => array(
        'name' => 'Novius OS',
    ),
    'namespace' => 'Nos\Templates\Custom',

    'i18n_file' => 'noviusos_templates_e::metadata',
    'launchers' => array(
    ),
    'enhancers' => array(
    ),
    'templates' => array(
        'noviusos_custom_common' => array(
            'file' => 'noviusos_templates_e::common',
            'title' => 'Custom template (Common version)',
            'cols' => 1,
            'rows' => 1,
            'layout' => array(
                'content' => '0,0,1,1',
            ),
            'module' => '',
        ),
        'noviusos_custom_jumbotron' => array(
            'file' => 'noviusos_templates_e::jumbotron',
            'title' => 'Custom template (Jumbotron version)',
            'cols' => 1,
            'rows' => 1,
            'layout' => array(
                'content' => '0,0,1,1',
            ),
            'module' => '',
        )
    ),
);
