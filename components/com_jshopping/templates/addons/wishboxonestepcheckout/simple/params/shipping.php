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

class JFormFieldShipping extends JFormField {

	public $type = 'shipping';

	protected function getInput(){
		require_once JPATH_SITE.'/components/com_jshopping/lib/factory.php'; 

		return JHTML::_( 'select.genericlist', JTable::getInstance('ShippingMethod', 'jshop')->getAllShippingMethods(0), $this->name.'[]', 'class="inputbox" size="8" id = "shipping_desc" multiple="multiple"', 'shipping_id', 'name', empty($this->value) ? '0' : $this->value );
	}
}
?>