<?php

namespace App\Routes;

use App\Model\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Routes {
	
	private $pdo;
	
	function __construct(){
		$this->pdo = new Model();		
	}

	public function load($app){
		
		$app->get('/api/v1/phones', function(){
			
			return $this->pdo->getAll('phones');
		});
		
		$app->get('/api/v1/phones/list', function(){
			
			return new Response('Hello from response', 200);
		});
		
		$app->get('/api/v1/phones/{id}', function($id){
			return 'phones/'.(int) $id;
		});
		
		
	}

}
