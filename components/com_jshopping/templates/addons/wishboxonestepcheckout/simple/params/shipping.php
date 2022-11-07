<?php
	// 
	defined('_JEXEC') or die;
	
	// 
	use \Joomla\CMS\Table\Table;
	use \Joomla\CMS\HTML\HTMLHelper;
	
	/**
	 *
	 */
	class JFormFieldShipping extends JFormField
	{
		/**
		 *
		 */
		public $type = 'shipping';
		
		/**
		 *
		 */
		protected function getInput()
		{
			// 
			// 
			require_once JPATH_SITE.'/components/com_jshopping/lib/factory.php';
			// 
			// 
			return HTMLHelper::_(
									'select.genericlist',
									Table::getInstance('ShippingMethod', 'jshop')->getAllShippingMethods(0),
									$this->name.'[]',
									'class="inputbox" size="8" id = "shipping_desc" multiple="multiple"',
									'shipping_id',
									'name',
									empty($this->value) ? '0' : $this->value
								);
		}
	}