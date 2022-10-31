<?php
	// 
	defined('_JEXEC') or die;
	
	// 
	// 
	$language = JFactory::getLanguage();
	// 
	// 
	$language->load('addon_jshopping_wishboxonestepcheckout', JPATH_SITE.'/components/com_jshopping/templates/addons/wishboxonestepcheckout/default/');
	// 
	// 
	$configPath = __DIR__.'/config.xml';
	// 
	// 
	$formFieldOneStepCheckoutTemplate = new JFormFieldWishBoxOneStepCheckout('wishboxonestepcheckouttemplate', $this->params, $configPath);
?>

<table border="0" cellpadding="0">
	<tr>
		<td valign="top" style="padding: 5px 10px">
			<div class="onestepcheckout-title">
				<?php echo JText::_('JSHOP_ONESTEPCHECKOUT_TEMPLATE_VIEW'); ?>
			</div>
			<table>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('message_adress'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('message_adress'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('message_payment'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('message_payment'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('message_shipping'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('message_shipping'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('overlay'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('overlay'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('login_form'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('login_form'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('step_number'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('step_number'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('step_name'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('step_name'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('product_image'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('product_image'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('placeholder'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('placeholder'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('payment_params'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('payment_params'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('shipping_params'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('shipping_params'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('columns_number'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('columns_number'); ?>
					</td>
				</tr>
			</table>
		</td>
		<td valign="top" style="padding: 5px 10px">
			<div class="onestepcheckout-title">
				<?php echo JText::_('JSHOP_ONESTEPCHECKOUT_PACKAGE'); ?>
			</div>
			<table>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('package_image'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('package_image'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('package_text'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('package_text'); ?>
					</td>
				</tr>
			</table>
		</td>
		<td valign="top" style="padding: 5px 10px">
			<div class="onestepcheckout-title">
				<?php echo JText::_('JSHOP_ONESTEPCHECKOUT_FINISH_EXTENDED'); ?>
			</div>
			<table>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('order_number'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('order_number'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('order_subtotal'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('order_subtotal'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('order_discount'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('order_discount'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('order_payment'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('order_payment'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('order_shipping'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('order_shipping'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('order_package'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('order_package'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('order_total'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('order_total'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('order_products'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('order_products'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('order_shipping_desc'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('order_shipping_desc'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $formFieldOneStepCheckoutTemplate->getLabelByName('order_payment_desc'); ?>
					</td>
					<td style="padding: 5px 10px">
						<?php echo $formFieldOneStepCheckoutTemplate->getInputByName('order_payment_desc'); ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>