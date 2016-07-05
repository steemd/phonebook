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
	
	function renderUpdateAction($id) {
		$phone = Phone::findById($id);
		return $this->render('update.html', $phone['result']);
	}
	//REST
	function getAction() {
		$phones = Phone::findAll();
		$phones['massege'] = 'result find';
		$result = json_encode($phones);
		return new Response($result, 200, array('Content-Type'=>'text/json'));
	}

	function getOneAction($id) {
		$phone = Phone::findById($id);
		if(is_null($phone)){
			$phone['massege'] = 'no result';
		} else {
			$phone['massege'] = 'result find';
		}

		$result = json_encode($phone);	
		return new Response($result, 200, array('Content-Type'=>'text/json'));
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
	
	function putAction(Request $req, $id){
		parse_str($req->getContent(), $put);
		
		$phone = new Phone();
		$phone->id = $put['id'];
		$phone->name = $put['name'];
		$phone->position = $put['position'];
		$phone->inner_phone = $put['inner_phone'];
		$phone->outer_phone = $put['outer_phone'];
		$phone->email = $put['email'];
		$phone->category_id = $put['category_id'];
		$result = $phone->save();
		return $result;
	}
	
	function deleteAction($id) {
		$phone = new Phone();
		$result = $phone->remove((int) $id);
		return new Response($result);
	}

}
