<?php
	// 
	defined('_JEXEC') or die;
	
	// 
	use \Joomla\CMS\HTML\HTMLHelper;
	
	
	/**
	 *
	 */
	class JFormFieldPayment extends JFormField
	{
		/**
		 *
		 */
		public $type = 'payment';
		
		
		/**
		 *
		 */
		protected function getInput()
		{
			// 
			// 
			return HTMLHelper::_( 'select.genericlist', \JSFactory::getTable('PaymentMethod')->getAllPaymentMethods(0), $this->name.'[]', 'class="inputbox" size="8" id = "payment_desc" multiple="multiple"', 'payment_id', 'name', empty($this->value) ? '0' : $this->value );
		}
	}