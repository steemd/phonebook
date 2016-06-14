<?php

namespace Phonebook\Controller;

use App\App;
use App\Controller\Controller;
use Phonebook\Model\Phone;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PhoneController extends Controller{

	function indexAction(){
		return $this->render('index.html');
	}

	function addAction() {
		return $this->render('add.html');
	}

}
