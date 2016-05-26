<?php

namespace App\Routes;

class Routes {

	public function load($app){
		$app->get('/api/v1/phones', function(){

			$resalt = '<h2>List of all Phones</h2>
			<ul>
			<li>One</li>
			<li>Two</li>
			<li>Three</li>
			</ul>';
			
			return $resalt;
		});
		
		$app->get('/api/v1/phones/{id}', function($id){
		return 'phone/'.(int) $id;
		});
	}

}
