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
		
		$app->get('/api/v1/phones', function(){	
			return $this->model->getAll('phones');
		});
		
		$app->get('/api/v1/phones/{id}', function($id){
			return $this->model->getById('phones', $id);
		});
	
	}

}
