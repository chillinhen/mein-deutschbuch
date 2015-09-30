<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package Adsense
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'adsense' => 'system/modules/adsense/adsense.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'adsense' => 'system/modules/adsense/templates',
));
