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
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    googleplus1 
 * @license    LGPL 
 * @filesource
 */


/**
 * -------------------------------------------------------------------------
 * BACK END MODULES
 * -------------------------------------------------------------------------
 *
 * Back end modules are stored in a global array called "BE_MOD". Each module 
 * has certain properties like an icon, an optional callback function and one 
 * or more tables. Each module belongs to a particular group.
 * 
 *   $GLOBALS['BE_MOD'] = array
 *   (
 *       'group_1' => array
 *       (
 *           'module_1' => array
 *           (
 *               'tables'       => array('table_1', 'table_2'),
 *               'key'          => array('Class', 'method'),
 *               'callback'     => 'ClassName',
 *               'icon'         => 'path/to/icon.gif',
 *               'stylesheet'   => 'path/to/stylesheet.css',
 *               'javascript'   => 'path/to/javascript.js'
 *           )
 *       )
 *   );
 * 
 * Use function array_insert() to modify an existing modules array.
 */


/**
 * -------------------------------------------------------------------------
 * FRONT END MODULES
 * -------------------------------------------------------------------------
 */
$GLOBALS['FE_MOD']['googleplus1']['mod_googleplus1button'] = 'mod_googleplus1button';
$GLOBALS['FE_MOD']['googleplus1']['mod_googleplus1share'] = 'mod_googleplus1share'; 

/**
 * -------------------------------------------------------------------------
 * CONTENT ELEMENTS
 * -------------------------------------------------------------------------
 */
 $GLOBALS['TL_CTE']['googleplus1']['googleplus1button'] = 'googleplus1button';
 $GLOBALS['TL_CTE']['googleplus1']['googleplus1share'] = 'googleplus1share'; 

/**
 * -------------------------------------------------------------------------
 * BACK END FORM FIELDS
 * -------------------------------------------------------------------------
 *
 * List all back end form fields and their class names.
 * 
 *   $GLOBALS['BE_FFL'] = array
 *   (
 *       'input'  => 'Class',
 *       'select' => 'Class'
 *   );
 * 
 * Use function array_insert() to modify an existing FFL array.
 */


/**
 * -------------------------------------------------------------------------
 * FRONT END FORM FIELDS
 * -------------------------------------------------------------------------
 *
 * List all form fields and their class names.
 * 
 *   $GLOBALS['TL_FFL'] = array
 *   (
 *       'input'  => Class,
 *       'select' => Class
 *   );
 * 
 * Use function array_insert() to modify an existing FFL array.
 */


/**
 * -------------------------------------------------------------------------
 * CACHE TABLES
 * -------------------------------------------------------------------------
 *
 * These tables are used to cache data and can be truncated using back end 
 * module "clear cache".
 * 
 *   $GLOBALS['TL_CACHE'] = array
 *   (
 *       'table_1',
 *       'table_2'
 *   );
 * 
 * Use function array_insert() to modify an existing cache array.
 */


/**
 * -------------------------------------------------------------------------
 * HOOKS
 * -------------------------------------------------------------------------
 */
 
/**
 * -------------------------------------------------------------------------
 * PAGE TYPES
 * -------------------------------------------------------------------------
 *
 * Page types and their corresponding front end controller class.
 * 
 *   $GLOBALS['TL_PTY'] = array
 *   (
 *       'type_1' => 'PageType1',
 *       'type_2' => 'PageType2'
 *   );
 * 
 * Use function array_insert() to modify an existing page types array.
 */
 
?>