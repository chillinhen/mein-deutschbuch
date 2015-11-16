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
 * Class googleplus1button
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */

class mod_googleplus1button extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'googleplus1button';

	public function generate()
	{

		if (TL_MODE == 'BE')
		{

			return "Google+1 button" ;

		}

		return parent::generate();
	}

	/**
	 * Generate module
	 */
	protected function compile()
	{
		
		
		switch($this->googleplusone_size)
		{
			case "s":
				$this->Template->size="small";
				break;
			case "m":
				$this->Template->size="medium";
				break;
			case "l":
				$this->Template->size="tall";
				break;
			case "d":
				$this->Template->size="standard";
				break;
			default:
				$this->Template->size="standard";
		}
		
		if($this->googleplusone_differenthref=="1")
		{
			$this->Template->differenthref=true;
			$this->Template->googleplusonehref=$this->googleplusone_href;
		}
		else
		{
			$this->Template->differenthref=false;
		}
		
		if($this->googleplusone_count=="1")
		{
			$this->Template->count=true;
		}
		else
		{
			$this->Template->count=false;
		}
		$this->Template->headline=$this->headline;
		$this->Template->cssclass="mod_googleplus1button";
		if($this->googleplusone_loading==''){$this->googleplusone_loading='s';}
		if($this->googleplusone_loading=='s')
		{
			$strTag='<script type="text/javascript" src="https://apis.google.com/js/plusone.js">';
			if($this->googleplusone_language!='')
			{
				$strTag.="{lang: '" . $this->googleplusone_language . "'}";
				$this->Template->button_language=$this->googleplusone_language;
			}
			else
			{
				$strTag.="{lang: 'en-US'}";
				$this->Template->button_language='en-US';
			}
			$strTag.='</script>';
			$GLOBALS['TL_HEAD'][]=$strTag;
		}
		elseif($this->googleplusone_loading=="a")
		{
			$strTag='<script type="text/javascript">';
				if($this->googleplusone_language!='')
				{
					$strTag.="
					window.___gcfg={
					lang: '" . $this->googleplusone_language . "'
					};";
					$this->Template->button_language=$this->googleplusone_language;
				}
				else
				{
					$strTag.="
					window.___gcfg={
					lang: 'en-US'
					};";
					$this->Template->button_language='en-US';
				}
				$strTag.='
				(function() {
				var po = document.createElement("script"); po.type = "text/javascript"; po.async =
				true;
				po.src = "https://apis.google.com/js/plusone.js";
				var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
				})
				();
				</script>';
				
				$GLOBALS['TL_MOOTOOLS'][]=$strTag;
		}
	}
}
?>