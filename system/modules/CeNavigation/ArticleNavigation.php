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
 * Class ArticleNavigation
 *
 * 
 * @copyright  Tristan Lins 2010,2011
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @package    ContentNavigation
 */
class ArticleNavigation extends \Frontend {
	
	/**
	 * Collect the headings from content elements.
	 * 
	 * @param Database_Result $objCte
	 * The database result of content elements.
	 * @param integer $intCurrentLevel
	 * The current heading level.
	 * @return mixed
	 * An structured array of the headings.
	 */
	protected function collect(\Database_Result $objCte, $intMinLevel = 1, $intMaxLevel = 6, $intCurrentLevel = 1) {
		$arrItems = array();
		$objPage = false;
		$intArticleId = 0;
		while ($objCte->next())
		{
			// get the page object of the article
			if ($intArticleId != $objCte->pid)
			{
				$objPage = $this->Database->prepare("
					SELECT
						p.*
					FROM
						tl_page p
					INNER JOIN
						tl_article a
						ON a.pid = p.id
					WHERE a.id = ?")
					->execute($intArticleId = $objCte->pid);
				if (!$objPage->next()) {
					$objPage = false;
					continue;
				}
			}
			
			// if no page is found for this article, skip this item
			elseif ($objPage == false)
			{
				continue;
			}
			
			// load headline and cssID
			$strHeadline = unserialize($objCte->headline);
			$strCssId = unserialize($objCte->cssID);
			
			// only add if headline AND cssID is given
			if (!empty($strHeadline['value']) && !empty($strCssId[0])) {
				// the current heading level
				$intLevel = intval(substr($strHeadline['unit'], 1));
				
				// go one level down, by calling the collect function
				if ($intLevel > $intCurrentLevel)
				{
					// go down if the level should be collected
					if ($intLevel <= $intMaxLevel)
					{
						$objCte->prev();
						$arrSubitems = $this->collect($objCte, $intMinLevel, $intMaxLevel, $intCurrentLevel + 1);
						if (count($arrItems))
						{
							$arrItems[count($arrItems)-1]['subitems'] = $arrSubitems;
						} else {
							$arrItems = $arrSubitems;
						}
					}
					
					// skip all items, below the max level
					else
					{
						while ($objCte->next())
						{
							$strHeadline = unserialize($objCte->headline);
							$intLevel = intval(substr($strHeadline['unit'], 1));
							if ($intLevel <= $intMaxLevel) {
								$objCte->prev();
								break;
							}
						}
					}
				}
				
				// this element is from an upper level
				elseif ($intLevel < $intCurrentLevel)
				{
					$objCte->prev();
					// just break and return to the upper level
					break;
				}
				
				// skip all upper level elements and merge all lower levels into one array 
				elseif ($intLevel < $intMinLevel)
				{
					while ($objCte->next())
					{
						$strHeadline = unserialize($objCte->headline);
						$intLevel = intval(substr($strHeadline['unit'], 1));
						if ($intLevel >= $intMinLevel)
						{
							$objCte->prev();
							$arrSubitems = $this->collect($objCte, $intMinLevel, $intMaxLevel, $intCurrentLevel + 1);
							if (count($arrSubitems))
							{
								$objCte->prev();
								$arrItems = array_merge(
									$arrItems,
									$arrSubitems
								);
							}
						}
					}
				}
				
				// add a new item of the same level
				else
				{
					$arrItem = array_merge(
						$objCte->row(),
						array(
							'title' => $strHeadline['value'],
							'href' => $this->generateFrontendUrl($objPage->row()) .'#'. $strCssId[0]
						));
					$arrItems[] = $arrItem;
				}
			}
		}
		return $arrItems;
	}
	
	/**
	 * Collect the headings from one article.
	 * 
	 * @param int $intArticleId
	 * The article id.
	 * @return mixed
	 * An structured array of the headings.
	 */
	public function fromArticle($intArticleId, $intMinLevel = 1, $intMaxLevel = 6) {
		return $this->collect(
			$this->Database->prepare("
				SELECT
					*
				FROM
					tl_content
				WHERE
					pid=?"
					. (!$this->Input->cookie('FE_PREVIEW') ? " AND invisible=''" : "") . "
				ORDER BY sorting")
			->execute($intArticleId),
			$intMinLevel,
			$intMaxLevel);
	}
	
	/**
	 * Collect the headings from some articles.
	 * 
	 * @param mixed $intArticleId
	 * Array of article id's.
	 * @return mixed
	 * An structured array of the headings.
	 */
	public function fromArticles($arrArticles, $intMinLevel = 1, $intMaxLevel = 6) {
		if (!count($arrArticles))
			return array();
		$arrWhere = array();
		$arrArgs = array();
		foreach ($arrArticles as $intId) {
			$arrWhere[] = 'a.id = ?';
			$arrArgs[] = $intId;
		}
		if (!count($arrWhere))
			return array();
		return $this->collect(
			$this->Database->prepare("
				SELECT
					c.*
				FROM
					tl_content c
				INNER JOIN
					tl_article a
					ON a.id = c.pid
				WHERE
					(" . implode(" OR ", $arrWhere) . ")"
					. (!$this->Input->cookie('FE_PREVIEW') ? " AND c.invisible=''" : "") . "
				ORDER BY
					a.sorting, c.sorting")
			->execute($arrArgs),
			$intMinLevel,
			$intMaxLevel);
	}
	
	/**
	 * Collect the headings from a column.
	 * 
	 * @param integer $intPageId
	 * The id of the page.
	 * @param string $strColumn
	 * The name of the column.
	 * @return mixed
	 * An structured array of the headings.
	 */
	public function fromColumn($intPageId, $strColumn = 'main', $intMinLevel = 1, $intMaxLevel = 6) {
		return $this->collect(
			$this->Database->prepare("
				SELECT
					c.*
				FROM
					tl_content c
				INNER JOIN
					tl_article a
					ON a.id = c.pid
				WHERE
						a.pid = ?
					AND a.inColumn = ?"
					. (!$this->Input->cookie('FE_PREVIEW') ? " AND c.invisible=''" : "") . "
				ORDER BY a.sorting,c.sorting")
			->execute($intPageId, $strColumn),
			$intMinLevel,
			$intMaxLevel);
	}
	
}
