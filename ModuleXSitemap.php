<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005-2009 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  InfinityLabs - Olck & Lins GbR 2009 
 * @author     Tristan Lins 
 * @package    xNavigation
 * @license    LGPL 
 * @filesource
 */


/**
 * Class ModuleXSitemap
 *
 * Front end module "xNavigation".
 * @copyright  InfinityLabs - Olck & Lins GbR 2009 
 * @author     Tristan Lins 
 * @package    xNavigation
 */
class ModuleXSitemap extends ModuleXNavigation {

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_sitemap';
	

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### SITEMAP ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'typolight/main.php?do=modules&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
		if ($this->includeRoot)
		{
			$this->rootPage = 0;
		}

		$this->showLevel = 0;
		$this->hardLimit = false;
		$this->levelOffset = 0;

		$this->Template->items = $this->renderXNavigation($this->rootPage);
	}
}

?>