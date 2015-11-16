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
 * Class mod_googleplus1button
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */

class mod_googleplus1share extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'googleplus1share';

	public function generate()
	{

		if (TL_MODE == 'BE')
		{

			return "Google+1 share button" ;

		}

		return parent::generate();
	}

	/**
	 * Generate module
	 */
	protected function compile()
	{
		global $objPage;
		if($this->googleplusone_differenthref=='1')
		{
			$this->Template->differenthref=true;
			$href=$this->googleplusone_href;
		}
		else
		{
			$this->Template->differenthref=false;
			$href=$this->Environment->url . $this->Environment->requestUri;
		}
		$this->Template->googleplusonehref=$this->urlencode($href);
		$this->Template->googleplusonetitle=$objPage->title;
		if($this->googleplusone_language!='')
		{
			$this->Template->button_language=$this->googleplusone_language;
		}
		else
		{
			$this->Template->button_language='en-US';
		}
		$this->Template->headline=$this->headline;
		$this->Template->cssclass="googleplus1share";
	}
}
?>