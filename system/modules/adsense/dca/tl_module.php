<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
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
 * @package    adsense 
 * @license    LGPL 
 * @filesource
 */



/**
 * Add selectors to tl_module
 */

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['adsense'] = '{title_legend},name,type,headline;{adsense_settings},adsense_clientid,adsense_adslot,adsense_height,adsense_width';


/**
 * Add subpalettes to tl_module
 */



/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['adsense_clientid'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['adsense_clientid'],
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
);
$GLOBALS['TL_DCA']['tl_module']['fields']['adsense_adslot'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['adsense_adslot'],
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
);
$GLOBALS['TL_DCA']['tl_module']['fields']['adsense_height'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['adsense_height'],
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true,'rgxp'=>digit,'tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_module']['fields']['adsense_width'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['adsense_width'],
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true,'rgxp'=>digit,'tl_class'=>'w50')
);

?>