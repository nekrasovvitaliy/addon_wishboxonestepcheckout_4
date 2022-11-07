<?php
	// 
	defined('_JEXEC') or die;
	
	// 
	// 
	use Joomla\CMS\HTML\HTMLHelper;
	use \Joomla\CMS\Language\Text;
	
if ($this->addonParams->step_number) {
	$step2number = $this->step2number.'. ';
	$step3number = $this->step3number.'. ';
	$step4number = $this->step4number.'. ';
	$step5number = $this->step5number.'. ';
} else {
	$step2number = $step3number = $step4number = $step5number = '';
}
if ($this->addonParams->step_name) {
	$step2name = Text::_('JSHOP_ONESTEPCHECKOUT_ADRESS_STEP');
	$step3name = $this->config->step_4_3 ? Text::_('JSHOP_ONESTEPCHECKOUT_SHIPPING_STEP') : Text::_('JSHOP_ONESTEPCHECKOUT_PAYMENT_STEP');
	$step4name = $this->config->step_4_3 ? Text::_('JSHOP_ONESTEPCHECKOUT_PAYMENT_STEP') : Text::_('JSHOP_ONESTEPCHECKOUT_SHIPPING_STEP');
	$step5name = Text::_('JSHOP_ONESTEPCHECKOUT_FINISH_STEP');
} else {
	$step2name = $step3name = $step4name = $step5name = '';
}
include __DIR__ . '/main.js.php';
if (file_exists(__DIR__ . '/custom.js.php')) {
include __DIR__ . '/custom.js.php';
} 
?>
<div id="step2errors"></div>
<div id="step3errors"></div>
<div id="step4errors"></div>
<?php
if ($this->addonParams->login_form && $this->config->shop_user_guest > 2 && $this->user->user_id == -1) {
?>
<form id="oneStepLoginForm" name="oneStepLoginForm" class="form-inline" action="<?php echo SEFLink('index.php?option=com_jshopping&controller=user&task=loginsave', 1,0, $this->config->use_ssl) ?>" method="post" >
	<h3 class="nvg-login-title">
		<?php echo Text::_('JSHOP_ONESTEPCHECKOUT_LOGIN_USER') ?>
	</h3>
		<?php if (!$this->addonParams->placeholder) { ?>
			<label for="username"><?php echo Text::_('JSHOP_ONESTEPCHECKOUT_USER_FIELD_U_NAME') ?></label>
		<?php } ?>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-user"></i></span>
			<input id="username" type="text" name="username" <?php if ($this->addonParams->placeholder) { ?>placeholder="<?php echo Text::_('JSHOP_ONESTEPCHECKOUT_USER_FIELD_U_NAME') ?>"<?php } ?> />
		</div>
		<?php if (!$this->addonParams->placeholder) { ?>
			<label for="passwd" class="uk-display-inline-block"> <?php echo Text::_('JSHOP_ONESTEPCHECKOUT_USER_FIELD_PASSWORD') ?></label>
		<?php } ?>
		<div class="input-prepend">
			<span class="add-on"><i class="icon-key"></i></span>
			<input id="passwd" type="password" name="passwd"  <?php if ($this->addonParams->placeholder) { ?>placeholder="<?php echo Text::_('JSHOP_ONESTEPCHECKOUT_USER_FIELD_PASSWORD') ?>"<?php } ?> />
		</div>

		<button type="submit" class="btn btn-success"><i class="icon-ok"></i></button>
		
	<?php echo HTMLHelper::_('form.token'); ?>
	<input type="hidden" name="return" value="<?php echo base64_encode($_SERVER['REQUEST_URI']) ?>" />
	<input type="hidden" name="onestepcheckout" value="1" />
</form>
<?php
}
?>
<form id="oneStepCheckoutForm" name="oneStepCheckoutForm" class="nvg-form" action="<?php echo $this->action ?>" method="post" onsubmit="return oneStepCheckout.validateForm(this)" >
	<div class="nvg-user-exist-or-new">
		<?php echo $this->user->user_id == -1 ? Text::_('JSHOP_ONESTEPCHECKOUT_NEW_USER') : Text::_('JSHOP_ONESTEPCHECKOUT_EXIST_USER') ?>
	</div>
	<div class="nvg-block-adress nvg-block-step2">
			<?php if ($step2number || $step2name) { ?>
				<h3 class="uk-panel-title step-header">
					<?php echo $step2number ?>
					<?php echo $step2name ?>
				</h3>		
			<?php } ?>
			<div id="step2">
				<?php echo $this->step2 ?>
			</div>
	</div>
	<div class="nvg-block-steps-wrapper" > 
		<div class="nvg-block-step3 <?php echo ($this->step3show != 1) ? 'nvg-hidden' : '' ?>">
				<?php if ($step3number || $step3name) { ?>
				<h3 class="step-header">
					<?php echo $step3number ?>
					<?php echo $step3name ?>
				</h3>	
				<?php } ?>
				<div id="step3">
					<?php echo $this->step3 ?>
				</div>
		</div>
		<div class="nvg-block-step4 <?php echo ($this->step4show != 1) ? 'nvg-hidden' : '' ?>">
			<?php if ($step4number || $step4name) { ?>
			<h3 class="step-header">
				<?php echo $step4number ?>
				<?php echo $step4name ?>
			</h3>	
			<?php } ?>
			<div id="step4">
				<?php echo $this->step4 ?>
			</div>
		</div>
	</div>
	<div class="nvg-block-step5 nvg-block-cart-table">
		<?php if ($step5number || $step5name) { ?>
		<h3 class="step-header">
			<?php echo $step5number ?>
			<?php echo $step5name ?>
		</h3>	
		<?php } ?>
		<div id="step5">
			<?php echo $this->step5 ?>
		</div>      
		<?php if ($this->config->display_agb){?>
		<div class="row_agb">
			
			<label class="text-info checkbox">
			<input type="checkbox" name="agb" class="checkbox" id="agb" checked="checked" />
			<?php echo Text::_('JSHOP_ONESTEPCHECKOUT_AGB_CONFIRM') ?>        
			<a class="policy" href="#" onclick="window.open('<?php echo SEFLink('index.php?option=com_jshopping&controller=content&task=view&page=agb&tmpl=component', 1);?>','window','width=800, height=600, scrollbars=yes, status=no, toolbar=no, menubar=no, resizable=yes, location=no');return false;">
				<?php echo Text::_('JSHOP_ONESTEPCHECKOUT_AGB_POLICY') ?>
			</a>
			<?php echo Text::_('JSHOP_ONESTEPCHECKOUT_AGB_AND') ?>
			<a class="policy" href="#" onclick="window.open('<?php echo SEFLink('index.php?option=com_jshopping&controller=content&task=view&page=return_policy&tmpl=component&cart=1', 1);?>','window','width=800, height=600, scrollbars=yes, status=no, toolbar=no, menubar=no, resizable=yes, location=no');return false;">
				<?php echo Text::_('JSHOP_ONESTEPCHECKOUT_RETURN_POLICY') ?>
			</a>
			</label>
		</div>
		<?php }?>
		<?php if($this->no_return){?>
		<div class="row_no_return">            
			<input type="checkbox" name="no_return" id="no_return" />        
			<?php echo _JSHOP_NO_RETURN_DESCRIPTION ?>     
		</div>
		<?php }?>
		<?php echo $this->_tmp_ext_html_previewfinish_agb ?>
		<div class="add_info">
			<?php if (!$this->addonParams->placeholder) { ?>
			<div class="os-name">
				<?php echo Text::_('JSHOP_ONESTEPCHECKOUT_ADD_INFO') ?> 
			</div>
			<?php } ?>
			<textarea class="span12 nvg-addinfo-textarea" <?php if ($this->addonParams->placeholder) { ?>placeholder="<?php echo Text::_('JSHOP_ONESTEPCHECKOUT_ADD_INFO') ?>"<?php } ?> width="100%" id="order_add_info" name="order_add_info"></textarea>
		</div> 
		<?php echo $this->_tmp_ext_html_previewfinish_end?>
	</div>

	<div class="text-center">
		<button type="submit" id="button_order_finish" class="btn btn-info button_order_finish">
			<i class="icon-ok"></i>
			<?php echo Text::_('JSHOP_ONESTEPCHECKOUT_ORDER_FINISH') ?>
		</button>
	</div>
	<?php echo HTMLHelper::_('form.token'); ?>
</form>
<?php if (!$this->config->without_payment) { ?>
<form id="payment_form" name="payment_form" action="javascript:void(0)" method="post">
	<input type="hidden" name="check_payment_form" value="1" />
	<?php echo HTMLHelper::_('form.token'); ?>
</form>
<?php
}
?>