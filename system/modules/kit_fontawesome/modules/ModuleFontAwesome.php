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
 * Run in a custom namespace, so the class can be replaced
 */
namespace KuehlMedia\FontAwesome;


/**
 * Class ModuleFontAwesome
 *
 * @copyright   Matthias Kuehl 2014
 * @author      Matthias Kuehl <http://www.matthias-kuehl.com>
 * @package     kit_fontawesome
 */
class ModuleFontAwesome extends \Frontend { 
    /**
     * Bootstrap Version
     * @var string
     * @since v.1.0.0
     */
    protected $version = '4.3.0';
    
    /**
     * Adds the Font Awesome to your page
     * @since v.1.0.0
     */
    public function addFontAwesome($objPage, $objLayout, $objPageRegular) {
        $blnXhtml = ($objPage->outputFormat == 'xhtml');
        $protocol = \Environment::get('ssl') ? 'https://' : 'http://';
        $baseurl = trim($objPage->staticFiles, "/");
        if ($baseurl == '') {
            $baseurl = trim($this->Environment->base, "/");
        }

        if ($objLayout->FontAwesome_source != '') {
            if ($objLayout->FontAwesome_source == 'local') {
               $source = $baseurl.'system/modules/kit_fontawesome/assets/css/font-awesome.min.css'; 
            } else {
               $source = $protocol.'netdna.bootstrapcdn.com/font-awesome/'.$this->version.'/css/font-awesome.css';
            }   
            $objPageRegular->Template->framework .= '<link' . ($blnXhtml ? ' type="text/css"' : '') .' rel="stylesheet" href="'.$source.'">' . "\n";
        }     
    }
       
 
}