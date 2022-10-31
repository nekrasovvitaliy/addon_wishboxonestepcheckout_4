<?php
	// 
	defined('_JEXEC') or die;
	
	// 
	// 
	use Joomla\CMS\Factory;
	use Joomla\CMS\Form\Form;
	use Joomla\CMS\HTML\HTMLHelper;
	use Joomla\CMS\Language\Text;
	use Joomla\CMS\Uri\Uri;
	
	/**
	 *
	 */
	class JFormFieldWishBoxOneStepCheckout extends JFormField
	{
		/**
		 *
		 */
		protected $form;
		
		/**
		 *
		 */
		protected $params;
		
		
		/**
		 *
		 */
		public function __construct($name, $params = [], $data = '')
		{
			// 
			// 
			if (!$data)
			{
				// 
				// 
				$data = dirname(__FILE__).'/config.xml';
			}
			// 
			// 
			$this->params = $params;
			// 
			// 
			$this->form = Form::getInstance($name, $data);
		}
		
		
		/**
		 *
		 */
		protected function getInput()
		{
			
		}
		
		
		/**
		 *
		 */
		public function getInputByName($name)
		{
			// 
			// 
			return $this->form->getInput('params['.$name.']', null, $this->params->$name);
		}
		
		
		/**
		 *
		 */
		public function getLabelByName($name)
		{
			// 
			// 
			return $this->form->getLabel('params['.$name.']');
		}
	}
	
	
	// 
	// 
	$app = Factory::getApplication();
	// 
	// 
	$this->params = (object)$this->params;
	// 
	// 
	$app->getLanguage()->load('plg_jshoppingadmin_wishboxadminonestepcheckout', JPATH_ADMINISTRATOR);
	// 
	// 
	if (!$this->params->template)
	{
		// 
		// 
		$this->params->template = 'default';
	}
	// 
	// 
	$get = $app->input->getArray($_GET);
	// 
	// 
	if (isset($get['template']) && $get['template'] != '')
	{
		// 
		// 
		$this->params->template = $get['template'];
	}
	// 
	// 
	unset($get['template']);
	// 
	// 
	$uri = 'index.php?'.http_build_query($get);
	// 
	// 
	$app->getLanguage()->load('addon_jshopping_onestepcheckout', JPATH_SITE.'/components/com_jshopping/templates/addons/onestepcheckout/'.$this->params->template);
	// 
	// 
	if (!isset($this->params->user_fields))
	{
		// 
		// 
		$this->params->user_fields = [];
	}
	// 
	// 
	jimport('joomla.html.html.bootstrap');
	// 
	// 
	HTMLHelper::_('bootstrap.tooltip');
	// 
	// 
	$document = $app->getDocument();
	// 
	// 
	$document->addStyleSheet(URI::root().'components/com_jshopping/addons/wishboxonestepcheckout/css/style.css');
	// 
	// 
	$document->addScript(URI::root().'components/com_jshopping/addons/wishboxonestepcheckout/js/tablednd.jquery.js');
	// 
	// 
	$jshopConfig = \JSFactory::getConfig();
	// 
	// 
	$tmp_fields = $jshopConfig->getListFieldsRegister();
	// 
	// 
	$config_fields = $tmp_fields['address'];
	// 
	// 
	$config = new \stdClass();
	// 
	// 
	include $jshopConfig->path.'config/default_config.php';
	// 
	// 
	$user_fields = [];
	// 
	// 
	foreach ($this->params->user_fields as $v)
	{
		// 
		// 
		if (in_array($v, $fields_client['address']))
		{
			// 
			// 
			$user_fields[] = $v;
		}
	}
	// 
	// 
	foreach ($fields_client['address'] as $v)
	{
		// 
		// 
		if (!in_array($v, $user_fields))
		{
			// 
			// 
			$user_fields[] = $v;
		}
	}
	// 
	// 
	$formFieldOneStepCheckout = new JFormFieldWishBoxOneStepCheckout('wishboxonestepcheckoutgeneral', $this->params);
?>
	<script type="text/javascript">
		//<![CDATA[
		function changeOneStepCheckoutTemplate(el)
		{
			// 
			// 
			if (confirm('<?php echo JText::_('JSHOP_ONESTEPCHECKOUT_TEMPLATE_CHANGE'); ?>'))
			{
				// 
				// 
				location.href='<?php echo $uri; ?>&template='+el.value;
			}
			else
			{
				// 
				// 
				jQuery(el).val('<?php echo $this->params->template; ?>');
			}
		}
	// 
	// 
	jQuery
	(
		function($)
		{
			$('#table_user_fields').tableDnD
			(
				{
					onDragClass: 'onestepcheckoutselected'
				}
			)
		}
	);
	//]]>
	</script>
	<?php echo HTMLHelper::_('uitab.startTabSet', 'tabsOneStepCheckoutSettings', ['active' => 'tab1', 'recall' => true, 'breakpoint' => 768]); ?>
	<?php echo HTMLHelper::_('uitab.addTab', 'tabsOneStepCheckoutSettings', 'tab1', Text::_('JSHOP_ONESTEPCHECKOUT_SETTINGS_GENERAL')); ?>
	<table border="0" cellpadding="0">
		<tr>
			<td valign="top" style="padding: 5px 10px">
				<table>
					<tr>
						<td>
							<?php echo $formFieldOneStepCheckout->getLabelByName('enable'); ?>
						</td>
						<td style="padding: 5px 10px">
							<?php echo $formFieldOneStepCheckout->getInputByName('enable'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formFieldOneStepCheckout->getLabelByName('skip_cart'); ?>
						</td>
						<td style="padding: 5px 10px">	
							<?php echo $formFieldOneStepCheckout->getInputByName('skip_cart'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formFieldOneStepCheckout->getLabelByName('finish_order'); ?>
						</td>
						<td style="padding: 5px 10px">	
							<?php echo $formFieldOneStepCheckout->getInputByName('finish_order'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formFieldOneStepCheckout->getLabelByName('finish_register'); ?>
						</td>
						<td style="padding: 5px 10px">	
							<?php echo $formFieldOneStepCheckout->getInputByName('finish_register'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formFieldOneStepCheckout->getLabelByName('registration'); ?>
						</td>
						<td style="padding: 5px 10px">	
							<?php echo $formFieldOneStepCheckout->getInputByName('registration'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formFieldOneStepCheckout->getLabelByName('finish_extended'); ?>
						</td>
						<td style="padding: 5px 10px">	
							<?php echo $formFieldOneStepCheckout->getInputByName('finish_extended'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formFieldOneStepCheckout->getLabelByName('package'); ?>
						</td>
						<td style="padding: 5px 10px">	
							<?php echo $formFieldOneStepCheckout->getInputByName('package'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formFieldOneStepCheckout->getLabelByName('refresh'); ?>
						</td>
						<td style="padding: 5px 10px">	
							<?php echo $formFieldOneStepCheckout->getInputByName('refresh'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formFieldOneStepCheckout->getLabelByName('use_mask'); ?>
						</td>
						<td style="padding: 5px 10px">	
							<?php echo $formFieldOneStepCheckout->getInputByName('use_mask'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formFieldOneStepCheckout->getLabelByName('define_mask'); ?>
						</td>
						<td style="padding: 5px 10px">	
							<?php echo $formFieldOneStepCheckout->getInputByName('define_mask'); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formFieldOneStepCheckout->getLabelByName('template'); ?>
						</td>
						<td style="padding: 5px 10px">	
							<?php echo $formFieldOneStepCheckout->getInputByName('template'); ?>
						</td>
					</tr>
				</table>
			</td>
			<td valign="top" style="padding: 5px 10px 5px 30px">
				<div>
					<?php echo $formFieldOneStepCheckout->getLabelByName('user_fields_onchange'); ?>
				</div>
				<?php echo $formFieldOneStepCheckout->getInputByName('user_fields_onchange'); ?>
				<div>
					<?php echo $formFieldOneStepCheckout->getLabelByName('payment_onchange'); ?>
				</div>
				<?php echo $formFieldOneStepCheckout->getInputByName('payment_onchange'); ?>
				<div>
					<?php echo $formFieldOneStepCheckout->getLabelByName('shipping_onchange'); ?>
				</div>
				<?php echo $formFieldOneStepCheckout->getInputByName('shipping_onchange'); ?>
				<?php echo $formFieldOneStepCheckout->getInputByName('hash'); ?>
			</td>
		</tr>
	</table>
	<?php echo HTMLHelper::_('uitab.endTab'); ?>
	<?php echo HTMLHelper::_('uitab.addTab', 'tabsOneStepCheckoutSettings', 'tab2', Text::_('JSHOP_ONESTEPCHECKOUT_SETTINGS_USER_FIELDS')); ?>
	<div class="onestepcheckout-fieldsetts">
		<div class="onestepcheckout-fieldslegend">
			<i class="onestepcheckout-icon-home"></i> - <?php echo JText::_('JSHOP_ONESTEPCHECKOUT_SETTINGS_USER_FIELDS_BASE') ?><br/><br/>
			<i class="onestepcheckout-icon-truck"></i> - <?php echo JText::_('JSHOP_ONESTEPCHECKOUT_SETTINGS_USER_FIELDS_DELIVERY') ?><br/><br/>
			<span class="onestepcheckout-box-showrequire"> </span> <span> - <?php echo JText::_('JSHOP_ONESTEPCHECKOUT_SETTINGS_USER_FIELDS_REQUIRE') ?></span><br/><br/>
			<span class="onestepcheckout-box-showcheck"> </span> <span> - <?php echo JText::_('JSHOP_ONESTEPCHECKOUT_SETTINGS_USER_FIELDS_CHECK') ?></span><br/><br/>
			<span class="onestepcheckout-box-showsimple"> </span> <span> - <?php echo JText::_('JSHOP_ONESTEPCHECKOUT_SETTINGS_USER_FIELDS_SIMPLE') ?></span><br/><br/><br/>
			<i class="onestepcheckout-icon-move"></i> - <?php echo JText::_('JSHOP_ONESTEPCHECKOUT_SETTINGS_USER_FIELDS_MOVE') ?><br/><br/>
			<br/><br/>
			<hr/>
			<?php echo JText::_('JSHOP_ONESTEPCHECKOUT_SETTINGS_USER_FIELDS_ASTERICS').' '.JText::_('JSHOP_ONESTEPCHECKOUT_TEMPLATE_DEPENDED') ?>
		</div>
	</div>
	<table id="table_user_fields" class="1sc_fields_table table" style="width:400px; font-size:14px;padding-left:20px" cellspacing="0" cellpadding="2">
		<thead>
			<tr>
				<th style="text-align:center;">
					<?php echo JText::_('JSHOP_TITLE'); ?>
				</th>
				<th style="text-align:center;">
					<span data-uk-tooltip title="<?php echo JText::_('JSHOP_DISPLAY'); ?>">
						<i class="onestepcheckout-icon-eye-open"></i>  /  <i class="onestepcheckout-icon-eye-close"></i>
					</span>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($user_fields as $v)
			{
				if (substr($v, 0, 2)=='d_' || $v=='privacy_statement')
				{
					continue;
				}
				$class_home = $class_track = 'onestepcheckoutsetshow';
				if (isset($config_fields[$v]['display']) && $config_fields[$v]['display'])
				{
					$class_home .= '-check';
				}
				if (isset($config_fields[$v]['require']) && $config_fields[$v]['require'])
				{
					$class_home .= '-require';
				}
				if (isset($config_fields['d_'.$v]['display']) && $config_fields['d_'.$v]['display'])
				{
					$class_track .= '-check';
				}
				if (isset($config_fields['d_'.$v]['require']) && $config_fields['d_'.$v]['require'])
				{
					$class_track .= '-require';
				}
			?>
			<tr id="params<?php echo $v; ?>">
				<td>
					<i class="wishboxonestepcheckout-icon-sort"></i>
					<?php echo JText::_('JSHOP_ONESTEPCHECKOUT_USER_FIELD_'.$v); ?>
					<input type="hidden" name="params[user_fields][]" value="<?php echo $v; ?>" />
				</td>
				<td>
					<div class="<?php echo $class_home ?>">
						<i class="wishboxonestepcheckout-icon-home"></i>
					</div>
					<div class="<?php echo $class_track ?>">
						<i class="wishboxonestepcheckout-icon-truck"></i>
					</div>
				</td>
			</tr>
			<?php }	?>
		</tbody>
	</table>
	<?php echo HTMLHelper::_('uitab.endTab'); ?>
	<?php echo HTMLHelper::_('uitab.addTab', 'tabsOneStepCheckoutSettings', 'tab3', Text::_('JSHOP_ONESTEPCHECKOUT_SETTINGS_TEMPLATES')); ?>
	<?php if (file_exists(JPATH_SITE.'/components/com_jshopping/templates/addons/wishboxonestepcheckout/'.$this->params->template.'/config.php')) { ?>
	<?php include JPATH_SITE.'/components/com_jshopping/templates/addons/wishboxonestepcheckout/'.$this->params->template.'/config.php'; ?>
	<?php } ?>
	<?php echo HTMLHelper::_('uitab.endTab'); ?>
	<?php echo HTMLHelper::_('uitab.endTabSet'); ?>