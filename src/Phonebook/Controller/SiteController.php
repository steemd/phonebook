<?php

namespace Phonebook\Controller;

use App\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteController extends Controller{

	function indexAction() {
		return $this->render('index.html');
	}

}
