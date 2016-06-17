<?php

namespace Phonebook\Controller;

use App\App;
use App\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller{

	function indexAction() {
		return $this->render('index.html');
	}
}
