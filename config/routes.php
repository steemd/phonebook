<?php
return array(
	'main' => array(
		'url' => '/',
		'controller' => 'Phonebook\\Controller\\SiteController::indexAction',
		'method' => 'GET',
	),
	
	'login' => array(
		'url' => '/login',
		'controller' => 'Phonebook\\Controller\\SecurityController::loginAction',
		'method' => 'GET|POST',
	),
	'logout' => array(
		'url' => '/logout',
		'controller' => 'Phonebook\\Controller\\SecurityController::logoutAction',
		'method' => 'GET',
	),
	
	'admin' => array(
		'url' => '/admin',
		'controller' => 'Phonebook\\Controller\\AdminController::indexAction',
		'method' => 'GET',
		'role' => 'admin',
	),
	
	'admin_phone_list' => array(
		'url' => '/admin/phone/list',
		'controller' => 'Phonebook\\Controller\\PhoneController::listAction',
		'method' => 'GET',
		'role' => 'admin',
	),
	
	'admin_phone_add' => array(
		'url' => '/admin/phone/add',
		'controller' => 'Phonebook\\Controller\\PhoneController::addAction',
		'method' => 'GET',
		'role' => 'admin',
	),
	// REST API
	'get_api_v1_phones' => array(
		'url' => '/api/v1/phones',
		'controller' => 'Phonebook\\Controller\\RestController::getPhonesAction',
		'method' => 'GET',
	),
	
	'get_api_v1_phones_id' => array(
		'url' => '/api/v1/phones/{id}',
		'controller' => 'Phonebook\\Controller\\RestController::getPhonesOneAction',
		'method' => 'GET',
	),
	
	'post_api_v1_phones' => array(
		'url' => '/api/v1/phones',
		'controller' => 'Phonebook\\Controller\\RestController::addPhonesAction',
		'method' => 'POST',
		'role' => 'admin',
	),
	
	'delete_api_v1_phones' => array(
		'url' => '/api/v1/phones/{id}',
		'controller' => 'Phonebook\\Controller\\RestController::removePhonesAction',
		'method' => 'DELETE',
		'role' => 'admin',
	),
);