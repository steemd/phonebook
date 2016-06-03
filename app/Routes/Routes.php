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
		$app->get('/api/v1/phones', function(){	
			$phones = new Phone();
			return new Response($phones->findAll(), 200, array('Content-Type'=>'text/json'));
		});
		
		$app->get('/api/v1/phones/{id}', function($id){
			$phone = new Phone();
			return new Response($phone->findById($id), 200, array('Content-Type'=>'text/json'));
		});
		
		$app->post('/api/v1/phones', function(){
			$phones = new Phone();
			$resalt = $phones->save($_POST);
			
			return $resalt;
		});
		
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
