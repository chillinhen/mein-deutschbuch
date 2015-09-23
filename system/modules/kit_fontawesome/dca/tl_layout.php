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
 * Extend tl_layout
 */


/**
 * PALETTES
 */
$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = str_replace('webfonts;', 'webfonts,FontAwesome_source;', $GLOBALS['TL_DCA']['tl_layout']['palettes']['default']);


/**
 * FIELDS
 */
$GLOBALS['TL_DCA']['tl_layout']['fields']['FontAwesome_source'] = array
(
  'label'                  			=> &$GLOBALS['TL_LANG']['tl_layout']['FontAwesome_source'],
  'exclude'                 			=> true,
  'inputType'               			=> 'select',
  'eval'                                        => array('includeBlankOption'=>true),
  'options'					=> array('none','local','cdn'),
  'reference' 					=> &$GLOBALS['TL_LANG']['tl_layout']['FontAwesome_source_reference'],
  'sql'                     			=> "varchar(5) NOT NULL default 'none'"
);