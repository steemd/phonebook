<?php

namespace App;

use Silex\Application;
use App\Routes\Routes;
use App\DI\Service;

class App extends Application {

	public function init() {
		session_start();

		Service::set('config', include __DIR__.'/../config/config.php');
		Service::set('app', $this);

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
