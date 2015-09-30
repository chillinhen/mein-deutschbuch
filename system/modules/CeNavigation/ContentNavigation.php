<?php

/**
 * [ce_navigation] Content Navigation Module
 * Copyright (C) 2010,2011 Tristan Lins
 *
 * Extension for:
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
 * @copyright  InfinitySoft 2010,2011
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    ContentNavigation
 * @license    LGPL
 * @filesource
 */

namespace InfinitySoft\CeNavigation;

/**
 * Class ContentNavigation
 *
 * 
 * @copyright  Tristan Lins 2010,2011
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    ContentNavigation
 */
class ContentNavigation extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_ce_navigation';
	
	protected function flatten(&$arrItems, $intLevel = 1) {
		if (!count($arrItems))
			return '';
		foreach ($arrItems as &$arrItem) {
			if (isset($arrItem['subitems'])) {
				$arrItem['subitems'] = $this->flatten($arrItem['subitems'], $intLevel + 1);
			}
			$arrItem['class'] = '';
		}
		
		$arrItems[0]['class'] = 'first';
		$arrItems[count($arrItems)-1]['class'] = 'last';
	
		$tpl = new \FrontendTemplate('ce_navigation');
		$tpl->items = $arrItems;
		$tpl->level = $intLevel;
		return $tpl->parse();
	}
	
	protected function compile()
	{
		global $objPage;
		$this->import('CeNavigation\\ArticleNavigation', 'ArticleNavigation');
		$this->ArticleNavigation = new \CeNavigation\ArticleNavigation();

		if (is_numeric($this->navigation_article)) {
			$arrItems = $this->ArticleNavigation->fromArticle($this->navigation_article, $this->navigation_min_level, $this->navigation_max_level);
		} else {
			$arrItems = $this->ArticleNavigation->fromColumn($objPage->id, $this->navigation_article, $this->navigation_min_level, $this->navigation_max_level);
		}
		
		$this->Template->items = $this->flatten($arrItems);
	}
	
}
