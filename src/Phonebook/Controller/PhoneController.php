<?php

namespace Phonebook\Controller;

use App\App;
use App\Controller\Controller;
use Phonebook\Model\Phone;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PhoneController extends Controller{

	private $app;

	function __construct(){
		$this->app = new App();
	}

	function indexAction(){	
		return $this->render('index.html');
	}
	
	function addAction() {
		if (isset($_POST[login]) && isset($_POST[pass])) {
				if($_POST[login] == 'admin' && $_POST[pass] == 'admin') {
					return $this->render('add.html');
				}
			}
				return $this->app->redirect('/admin');
	}

}