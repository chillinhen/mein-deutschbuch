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
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'KuehlMedia',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'KuehlMedia\FontAwesome\ModuleFontAwesome' => 'system/modules/kit_fontawesome/modules/ModuleFontAwesome.php',
));