<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */

	/**
	 * Tables.
	 **/
	$config['tables']['groups'] = 'groups';
	$config['tables']['users']  = 'users';
	$config['tables']['meta']   = 'meta';
	
	/**
	 * Default group, use name
	 */
	$config['default_group'] = 'user';
	 
	/**
	 * Meta table column you want to join WITH.
	 * Joins from users.id
	 **/
	$config['join'] = 'user_id';
	
	/**
	 * Columns in your meta table,
	 * id not required.
	 **/
	$config['columns'] = array('first_name', 'last_name');
	
	/**
	 * A database column which is used to
	 * login with.
	 **/
	$config['identity'] = 'email';

	/**
	 * Email Activation for registration
	 **/
	$config['email_activation'] = false;
	
	/**
	 * Folder where email templates are stored.
	 * Default : redux_auth/
	 **/
	$config['email_templates'] = 'redux_auth/';

	/**
	 * Salt Length
	 **/
	$config['salt_length'] = 10;
	
	$config['encryption_key'] = "7fdbd0f2211488a470327ddf9b1d5be6"; // Generate a random key.

	$config['sess_encrypt_cookie']		=	TRUE;
	$config['sess_use_database']		=	TRUE;
	$config['sess_match_ip']			=	TRUE;
	$config['sess_match_useragent']		=	TRUE;

	$config['sess_table_name'] = 'sessions';
	
?>