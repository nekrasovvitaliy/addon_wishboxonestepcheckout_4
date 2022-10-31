<?php
	// 
	// 
	$addon_table = JSFactory::getTable('addon');
	// 
	// 
	$addon_table->loadAlias('wishboxonestepcheckout');
	// 
	// 
	$addon_table->set('name', 'WishBox One step checkout');
	// 
	// 
	$addon_table->set('version', '1.0.0');
	// 
	// 
	$addon_table->set('uninstall', '/components/com_jshopping/addons/wishboxonestepcheckout/uninstall.php');
	// 
	// 
	$addon_table->store();
	// 
	// 
	$addon_table->installJoomlaExtension(
											[
												'name' => 'plg_jshoppingadmin_wishboxadminonestepcheckout',
												'type' => 'plugin',
												'element' => 'wishboxadminonestepcheckout',
												'folder' => 'jshoppingadmin',
												'client_id' => '0',
												'enabled' => 1
											],
											true
										);
	// 
	// 
	$addon_table->installJoomlaExtension(
											[
												'name' => 'plg_jshoppingcheckout_wishboxcheckoutonestepcheckout',
												'type' => 'plugin',
												'element' => 'wishboxcheckoutonestepcheckout',
												'folder' => 'jshoppingcheckout',
												'client_id' => '0',
												'enabled' => 1
											],
											true
										);