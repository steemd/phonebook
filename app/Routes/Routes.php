<?php

namespace App\Routes;

use App\Model\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Routes {
	
	private $model;
	
	function __construct(){
		$this->model = new Model();		
	}

	public function load($app){
		
		$app->get('/', function(){
			
			ob_start();
			include __DIR__.'/../../src/Phonebook/Views/index.html.php';
			$resalt = ob_get_contents();
			ob_clean();
			
			return $resalt;
		});
		
		$app->get('/api/v1/phones', function(){	
			return new Response($this->model->getAll('phones'), 200, array('Content-Type'=>'text/json'));
		});
		
		$app->get('/api/v1/phones/{id}', function($id){
			return new Response($this->model->getById('phones', $id), 200, array('Content-Type'=>'text/json'));
		});
		
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
