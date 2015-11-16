<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  2010 Andreas Koob
 * @author     Andreas Koob
 * @package    googleplus1
 * @license    LGPL
 * @filesource
 */


/**
 * Add palette
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'googleplusone_differenthref';

$GLOBALS['TL_DCA']['tl_content']['palettes']['googleplus1button'] = '{type_legend},type,headline;{googleplusone_settings},googleplusone_language,googleplusone_size,googleplusone_count,googleplusone_differenthref,googleplusone_loading;{expert_legend:hide},cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['googleplus1share'] = '{type_legend},type,headline;{googleplusone_settings},googleplusone_language,googleplusone_differenthref;{expert_legend:hide},cssID,space';

$GLOBALS['TL_DCA']['tl_content']['subpalettes']['googleplusone_differenthref'] = 'googleplusone_href';

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['googleplusone_count'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['googleplusone_count'],
	'exclude'                 => false,
	'inputType'               => 'checkbox',
	'eval'                    => array('mandatory'=>false)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['googleplusone_differenthref'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['googleplusone_differenthref'],
	'exclude'                 => false,
	'inputType'               => 'checkbox',
	'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['googleplusone_href'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['googleplusone_href'],
	'exclude'                 => false,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>false,)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['googleplusone_size'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['googleplusone_size'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'				  => array('s','m','d','l'),
	'reference'				  => &$GLOBALS['TL_LANG']['tl_content']['googleplusone_size']['reference'],
	'eval'                    => array('mandatory'=>true)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['googleplusone_loading'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['googleplusone_loading'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'				  => array('a','s'),
	'reference'				  => &$GLOBALS['TL_LANG']['tl_content']['googleplusone_loading']['reference'],
	'eval'                    => array('mandatory'=>true)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['googleplusone_language'] = array(
	'label'		=>	&$GLOBALS['TL_LANG']['tl_content']['googleplusone_language'],
	'exclude'	=>	true,
	'inputType'	=> 'select',
	'default'   => 'en-US',
	'options'	=> array('ar','bg','ca','zh-CN','zh-TW','hr','cs','da','nl','en-GB','en-US','et','fil','fi','fr','de','el','iw','hi','hu','id','it','ja','ko','lv','lt','ms','no','fa','pl','pt-BR','pt-PT','ro','ru','sr','sk','sl','es','es-419','sv','th','tr','uk','vi'),
	'reference'	=> &$GLOBALS['TL_LANG']['googleplusone_language']['reference'],
	'eval'		=> array('mandatory'=>true)
);
?>