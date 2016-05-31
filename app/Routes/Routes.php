<?php

namespace App\Routes;

use App\Model\Model;
use App\Renderer\Renderer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Routes {
	
	private $model;
	
	function __construct(){
		$this->model = new Model();		
	}

	public function load($app){
		
		// Front-end
		$app->get('/', function(){
			
			$render = new Renderer('index.html');
			$result = $render->getContent();
						
			return new Response($result, 200);
		});
		
		$app->get('/admin', function(){	
			$render = new Renderer('admin.html');
			$result = $render->getContent();
						
			return new Response($result, 200);
		});
		

		// REST API
		$app->get('/api/v1/phones', function(){	
			return new Response($this->model->getAll('phones'), 200, array('Content-Type'=>'text/json'));
		});
		
		$app->get('/api/v1/phones/{id}', function($id){
			return new Response($this->model->getById('phones', $id), 200, array('Content-Type'=>'text/json'));
		});
		
		$app->post('/api/v1/phones', function(){
			$resalt = $this->model->save('phones', $_POST);
			
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
