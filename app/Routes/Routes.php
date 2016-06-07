<?php

namespace App\Routes;

use App\Model\Model;
use App\Renderer\Renderer;
use Phonebook\Model\Phone;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Routes {

	function __construct(){	
	}

	public function load($app){
		
		// Front-end
		$app->get('/', 'Phonebook\\Controller\\PhoneController::indexAction');
		
		$app->get('/admin', 'Phonebook\\Controller\\SecurityController::loginAction');
		
		$app->post('/admin', 'Phonebook\\Controller\\PhoneController::addAction');

		// REST API
		$app->get('/api/v1/phones', 'Phonebook\\Controller\\RestController::getPhonesAction');
		
		$app->get('/api/v1/phones/{id}', 'Phonebook\\Controller\\RestController::getPhonesOneAction');
		
		$app->post('/api/v1/phones', 'Phonebook\\Controller\\RestController::addPhonesAction');
		
		// Error Page
		$app->error(function (\Exception $e, $code) {
			switch ($code) {
				case 404:
					$message = 'The requested page could not be found.';
					break;
				default:
					$message = 'We are sorry, but something went terribly wrong.';
			}

			return new Response($message);
		});
	
	}

}
