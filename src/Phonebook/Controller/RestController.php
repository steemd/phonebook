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
		
		$phone = new Phone();

		$phone->name = $_POST['name'];
		$phone->position = $_POST['position'];
		$phone->inner_phone = $_POST['inner_phone'];
		$phone->outer_phone = $_POST['outer_phone'];
		$phone->email = $_POST['email'];
		$phone->category_id = $_POST['category_id'];

		$result = $phone->save();
			
		return $result;
	}
}