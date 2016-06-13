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
		
		include __DIR__.'/../../config/routes.php';
		
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
