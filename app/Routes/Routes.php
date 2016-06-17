<?php

namespace App\Routes;

use App\Model\Model;
use App\Renderer\Renderer;
use Phonebook\Model\Phone;
use App\Security\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Routes {

	function __construct(){
	}

	public function load($app){

		$this->generateRoures(include __DIR__.'/../../config/routes.php', $app);
		
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
	
	private function generateRoures($routes, $app) {
		foreach ($routes as $route) {
			$app->match($route['url'], $route['controller'])
			->method($route['method'])
			->before(function() use ($route) {
				if ($route['role'] == 'admin'){
					return Security::varifyRoute();
				}
			});
		}
	}

}
