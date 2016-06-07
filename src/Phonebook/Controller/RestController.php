<?php

namespace Phonebook\Controller;

use App\Controller\Controller;
use Phonebook\Model\Phone;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RestController extends Controller{

	function getPhonesAction() {
		$phones = new Phone();
		return new Response($phones->findAll(), 200, array('Content-Type'=>'text/json'));
	}
	
	function getPhonesOneAction($id) {
		$phone = new Phone();
		return new Response($phone->findById($id), 200, array('Content-Type'=>'text/json'));
	}
	
	function addPhonesAction() {
		$phones = new Phone();
		$resalt = $phones->save($_POST);
			
		return $resalt;
	}
}