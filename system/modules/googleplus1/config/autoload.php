<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package googleplus1
 * @link    http://www.contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'googleplus1button'    => 'system/modules/googleplus1/googleplus1button.php',
	'googleplus1share'     => 'system/modules/googleplus1/googleplus1share.php',
	'mod_googleplus1button'=> 'system/modules/googleplus1/mod_googleplus1button.php',
	'mod_googleplus1share' => 'system/modules/googleplus1/mod_googleplus1share.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'googleplus1button' => 'system/modules/googleplus1/templates',
	'googleplus1share'  => 'system/modules/googleplus1/templates',
));
