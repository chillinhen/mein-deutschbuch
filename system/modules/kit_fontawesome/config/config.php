<?php 

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package     km_fontawesome
 * @copyright   Kuehl Media 2014
 * @author      Matthias Kuehl <http://www.matthias-kuehl.com>
 * @link        http://www.Kuehl-Media.de
 * @license     http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['generatePage'][] = array('KuehlMedia\FontAwesome\ModuleFontAwesome', 'addFontAwesome');