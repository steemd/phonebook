<?php

namespace Phonebook\Controller;

use App\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller{

	function loginAction() {
		return $this->render('login.html');
	}
}