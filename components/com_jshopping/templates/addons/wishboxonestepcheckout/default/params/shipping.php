<?php

defined('_JEXEC') or die;

class JFormFieldShipping extends JFormField {

	public $type = 'shipping';

	protected function getInput(){
		

		return JHTML::_( 'select.genericlist', \JSFactory::getTable('ShippingMethod')->getAllShippingMethods(0), $this->name.'[]', 'class="inputbox" size="8" id = "shipping_desc" multiple="multiple"', 'shipping_id', 'name', empty($this->value) ? '0' : $this->value );
	}
}