<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Check if the currently logger in user has the necessary permissions
 * to permform the given action
 *
 * Valid permissions strings are given below :
 *
 * 'view voucher'
 * 'create voucher'
 * 'edit voucher'
 * 'delete voucher'
 * 'print voucher'
 * 'email voucher'
 * 'download voucher'
 * 'view inventory entry'
 * 'create inventory entry'
 * 'edit inventory entry'
 * 'delete inventory entry'
 * 'print inventory entry'
 * 'email inventory entry'
 * 'download inventory entry'
 * 'create ledger'
 * 'edit ledger'
 * 'delete ledger'
 * 'create group'
 * 'edit group'
 * 'delete group'
 * 'create inventory unit'
 * 'edit inventory unit'
 * 'delete inventory unit'
 * 'create inventory group'
 * 'edit inventory group'
 * 'delete inventory group'
 * 'create inventory item',
 * 'edit inventory item',
 * 'delete inventory item',
 * 'create tag'
 * 'edit tag'
 * 'delete tag'
 * 'view reports'
 * 'view log'
 * 'clear log'
 * 'change account settings'
 * 'cf account'
 * 'backup account'
 * 'administer'
 */

if ( ! function_exists('check_access'))
{
	function check_access($action_name)
	{
		$CI =& get_instance();
		$user_role = $CI->session->userdata('user_role');
		$permissions['manager'] = array(
			'view voucher',
			'create voucher',
			'edit voucher',
			'delete voucher',
			'print voucher',
			'email voucher',
			'download voucher',
			'view inventory entry',
			'create inventory entry',
			'edit inventory entry',
			'delete inventory entry',
			'print inventory entry',
			'email inventory entry',
			'download inventory entry',
			'create ledger',
			'edit ledger',
			'delete ledger',
			'create group',
			'edit group',
			'delete group',
			'create inventory unit',
			'edit inventory unit',
			'delete inventory unit',
			'create inventory group',
			'edit inventory group',
			'delete inventory group',
			'create inventory item',
			'edit inventory item',
			'delete inventory item',
			'create tag',
			'edit tag',
			'delete tag',
			'view reports',
			'view log',
			'clear log',
			'change account settings',
			'cf account',
			'backup account',
		);
		$permissions['accountant'] = array(
			'view voucher',
			'create voucher',
			'edit voucher',
			'delete voucher',
			'print voucher',
			'email voucher',
			'download voucher',
			'view inventory entry',
			'create inventory entry',
			'edit inventory entry',
			'delete inventory entry',
			'print inventory entry',
			'email inventory entry',
			'download inventory entry',
			'create ledger',
			'edit ledger',
			'delete ledger',
			'create group',
			'edit group',
			'delete group',
			'create inventory unit',
			'edit inventory unit',
			'delete inventory unit',
			'create inventory group',
			'edit inventory group',
			'delete inventory group',
			'create inventory item',
			'edit inventory item',
			'delete inventory item',
			'create tag',
			'edit tag',
			'delete tag',
			'view reports',
			'view log',
			'clear log',
		);
		$permissions['dataentry'] = array(
			'view voucher',
			'create voucher',
			'edit voucher',
			'delete voucher',
			'print voucher',
			'email voucher',
			'download voucher',
			'view inventory entry',
			'create inventory entry',
			'edit inventory entry',
			'delete inventory entry',
			'print inventory entry',
			'email inventory entry',
			'download inventory entry',
			'create ledger',
			'edit ledger',
			'create inventory item',
			'edit inventory item',
		);
		$permissions['guest'] = array(
			'view voucher',
			'print voucher',
			'email voucher',
			'download voucher',
		);

		if ( ! isset($user_role))
			return FALSE;

		/* If user is administrator then always allow access */
		if ($user_role == "administrator")
			return TRUE;

		if ( ! isset($permissions[$user_role]))
			return FALSE;

		if (in_array($action_name, $permissions[$user_role]))
			return TRUE;
		else
			return FALSE;
	}
}

/* End of file access_helper.php */
/* Location: ./system/application/helpers/access_helper.php */
