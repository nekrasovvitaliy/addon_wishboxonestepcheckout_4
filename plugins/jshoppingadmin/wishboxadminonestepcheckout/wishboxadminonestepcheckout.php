<?php
	// 
	defined('_JEXEC') or die;
	
	// 
	use \Joomla\CMS\HTML\HTMLHelper;
	use \Joomla\CMS\Table\Table;
	use \Joomla\CMS\Language\Text;
	
	
	/**
	 *
	 */
	class plgJSshoppingAdminWishBoxAdminOnestepcheckout extends JPlugin
	{
		/**
		 *
		 */
		private $addonParams;
		
		
		/**
		 *
		 */
		private $jshopConfig;
		
		
		/**
		 *
		 */
		private function checkAddonData()
		{
			// 
			// 
			if ($this->addonParams === null)
			{
				// 
				// 
				$t_addon = Table::getInstance('addon', 'jshop');
				// 
				// 
				$t_addon->loadAlias('addon_onestepcheckout');
				// 
				// 
				$this->addonParams = (object)$t_addon->getParams();
				// 
				// 
				\JFactory::getLanguage()->load('addon_jshopping_onestepcheckout', JPATH_ADMINISTRATOR);
				// 
				// 
				$this->jshopConfig = \JSFactory::getConfig();
			}
			// 
			// 
			return $this->addonParams->enable;
		}
		
		
		/**
		 *
		 */
		public function onBeforeEditConfigAdminFunction(&$view)
		{
			// 
			// 
			$this->checkAddonData();
			// 
			// 
			$shop_register_type = [];
			// 
			// 
			$shop_register_type[] = HTMLHelper::_('select.option', 0, Text::_('JSHOP_ONESTEPCHECKOUT_MANDATORY_REGISTRATION_BEFORE'), 'id', 'name');
			// 
			// 
			$shop_register_type[] = HTMLHelper::_('select.option', 1, Text::_('JSHOP_ONESTEPCHECKOUT_NO_MANDATORY_REGISTRATION_BEFORE'), 'id', 'name');
			// 
			// 
			$shop_register_type[] = HTMLHelper::_('select.option', 2, Text::_('JSHOP_ONESTEPCHECKOUT_WITHOUT_REGISTRATION'), 'id', 'name');
			// 
			// 
			$shop_register_type[] = HTMLHelper::_('select.option', 3, Text::_('JSHOP_ONESTEPCHECKOUT_MANDATORY_REGISTRATION_UNTIL'), 'id', 'name', !$this->addonParams->enable ? true : false);
			// 
			// 
			$shop_register_type[] = HTMLHelper::_('select.option', 4, Text::_('JSHOP_ONESTEPCHECKOUT_NO_MANDATORY_REGISTRATION_UNTIL'), 'id', 'name', !$this->addonParams->enable ? true : false);
			// 
			// 
			$view->lists['shop_register_type'] = HTMLHelper::_('select.genericlist', $shop_register_type, 'shop_user_guest','class = "inputbox" size = "1"','id','name', !$this->addonParams->enable && $this->jshopConfig->shop_user_guest > 2 ? 0 : $this->jshopConfig->shop_user_guest);
		}
	}