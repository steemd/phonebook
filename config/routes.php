<?php
return array(
	'main' => array(
		'url' => '/',
		'controller' => 'Phonebook\\Controller\\SiteController::indexAction',
	),
	
	'login' => array(
		'url' => '/login',
		'controller' => 'Phonebook\\Controller\\SecurityController::loginAction',
		'method' => 'GET|POST',
	),
	'logout' => array(
		'url' => '/logout',
		'controller' => 'Phonebook\\Controller\\SecurityController::logoutAction',
	),
	
	'admin' => array(
		'url' => '/admin',
		'controller' => 'Phonebook\\Controller\\AdminController::indexAction',
		'role' => 'user',
	),
	//Phones Controllers
	'admin_phone_list' => array(
		'url' => '/admin/phone/list',
		'controller' => 'Phonebook\\Controller\\PhoneController::renderListAction',
		'role' => 'user',
	),
	
	'admin_phone_add' => array(
		'url' => '/admin/phone/add',
		'controller' => 'Phonebook\\Controller\\PhoneController::renderAddAction',
		'role' => 'user',
	),
	// REST API
	'get_api_v1_phones' => array(
		'url' => '/api/v1/phones',
		'controller' => 'Phonebook\\Controller\\PhoneController::getAction',
	),
	
	'get_api_v1_phones_id' => array(
		'url' => '/api/v1/phones/{id}',
		'controller' => 'Phonebook\\Controller\\PhoneController::getOneAction',
	),
	
	'post_api_v1_phones' => array(
		'url' => '/api/v1/phones',
		'controller' => 'Phonebook\\Controller\\PhoneController::postAction',
		'method' => 'POST',
		'role' => 'user',
	),
	
	'delete_api_v1_phones' => array(
		'url' => '/api/v1/phones/{id}',
		'controller' => 'Phonebook\\Controller\\PhoneController::deleteAction',
		'method' => 'DELETE',
		'role' => 'user',
	),
);