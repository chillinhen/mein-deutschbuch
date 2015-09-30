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
 * Class adsense 
 *
 * @copyright  2010 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class adsense extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'adsense';


	/**
	 * Generate module
	 */
	protected function compile()
	{
		$this->Template->adsense_adslot=$this->adsense_adslot;
		$this->Template->adsense_client=$this->adsense_clientid;
		$this->Template->adsense_height=$this->adsense_height;
		$this->Template->adsense_width=$this->adsense_width;
	}
}

?>