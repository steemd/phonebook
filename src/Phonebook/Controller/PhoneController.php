<?php

namespace Phonebook\Controller;

use App\App;
use App\Controller\Controller;
use Phonebook\Model\Phone;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PhoneController extends RestController{

	function renderListAction() {
		return $this->render('list.html');
	}
	
	function renderAddAction() {
		return $this->render('add.html');
	}
	//REST
	function getAction() {
		$phones = new Phone();
		return new Response($phones->findAll(), 200, array('Content-Type'=>'text/json'));
	}
	
	function getOneAction($id) {
		$phone = new Phone();
		return new Response($phone->findById($id), 200, array('Content-Type'=>'text/json'));
	}
	
	function postAction() {	
		$phone = new Phone();
		$phone->name = $_POST['name'];
		$phone->position = $_POST['position'];
		$phone->inner_phone = $_POST['inner_phone'];
		$phone->outer_phone = $_POST['outer_phone'];
		$phone->email = $_POST['email'];
		$phone->category_id = $_POST['category_id'];
		$result = $phone->save();		
		return new Response($result);
	}
	
	function putAction(){
		//
	}
	
	function deleteAction($id) {
		$phone = new Phone();
		$result = $phone->remove((int) $id);
		return new Response($result);
	}

}
