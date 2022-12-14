<?php
/**
* @package Joomla
* @subpackage JoomShopping
* @author Garry
* @website https://joom-shopping.com/
* @email info@joom-shopping.com
* @copyright Copyright © joom-shopping All rights reserved.
* @license GNU GPO
**/

	defined('_JEXEC') or die;

	use \Joomla\CMS\HTML\HTMLHelper;
	use \Joomla\CMS\Table\Table;

class JFormFieldPayment extends JFormField {

	public $type = 'payment';

	protected function getInput(){
		require_once JPATH_SITE.'/components/com_jshopping/lib/factory.php'; 

		return HTMLHelper::_( 'select.genericlist', Table::getInstance('PaymentMethod', 'jshop')->getAllPaymentMethods(0), $this->name.'[]', 'class="inputbox" size="8" id = "payment_desc" multiple="multiple"', 'payment_id', 'name', empty($this->value) ? '0' : $this->value );
	}
}
?>