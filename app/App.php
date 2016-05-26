<?php

namespace App;

use Silex\Application;
use App\Routes\Routes;

class App extends Application {

	public function init() {
		try{
		
			$this->loadRoutes();
			
		} catch (\Exception $e) {
			echo $e->getMessage();
		}
	}
	
	private function loadRoutes(){
		$routes = new Routes();
		$routes->load($this);
	}

}