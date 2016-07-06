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
	'admin_phone_update' => array(
		'url' => '/admin/phone/update/{id}',
		'controller' => 'Phonebook\\Controller\\PhoneController::renderUpdateAction',
		'role' => 'user',
	),	
	'admin_phone_add' => array(
		'url' => '/admin/phone/add',
		'controller' => 'Phonebook\\Controller\\PhoneController::renderAddAction',
		'role' => 'user',
	),
	
	//Categories Controllers
	'admin_category_list' => array(
		'url' => '/admin/category/list',
		'controller' => 'Phonebook\\Controller\\CategoryController::renderListAction',
		'role' => 'user',
	),
	'admin_category_add' => array(
		'url' => '/admin/category/add',
		'controller' => 'Phonebook\\Controller\\CategoryController::renderAddAction',
		'role' => 'user',
	),
	
	// REST API
	'get_api_v1_categories' => array(
		'url' => '/api/v1/categories',
		'controller' => 'Phonebook\\Controller\\CategoryController::getAction',
	),
	'get_api_v1_categories_id' => array(
		'url' => '/api/v1/categories/{id}',
		'controller' => 'Phonebook\\Controller\\CategoryController::getOneAction',
	),
	'post_api_v1_categories' => array(
		'url' => '/api/v1/categories',
		'controller' => 'Phonebook\\Controller\\CategoryController::postAction',
		'method' => 'POST',
		'role' => 'user',
	),
	'delete_api_v1_categories' => array(
		'url' => '/api/v1/categories/{id}',
		'controller' => 'Phonebook\\Controller\\CategoryController::deleteAction',
		'method' => 'DELETE',
		'role' => 'user',
	),
	
	'get_api_v1_phones' => array(
		'url' => '/api/v1/phones',
		'controller' => 'Phonebook\\Controller\\PhoneController::getAction',
	),
	'get_api_v1_phones_id' => array(
		'url' => '/api/v1/phones/{id}',
		'controller' => 'Phonebook\\Controller\\PhoneController::getOneAction',
	),
	'put_api_v1_phones' => array(
		'url' => '/api/v1/phones/{id}',
		'controller' => 'Phonebook\\Controller\\PhoneController::putAction',
		'method' => 'PUT',
		'role' => 'user',
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