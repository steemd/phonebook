<?php

namespace Phonebook\Controller;

use App\Controller\Controller;
use App\DI\Service;
use App\Security\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller{

	function loginAction() {
		if (Security::varifyUser()) {
			return Service::get('app')->redirect('add');
		}
		return $this->render('login.html');
	}

	function logoutAction() {
		session_destroy();
		return Service::get('app')->redirect('/www');
	}
}
