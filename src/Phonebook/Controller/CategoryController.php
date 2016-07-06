<?php

namespace Phonebook\Controller;

use App\App;
use App\Controller\Controller;
use Phonebook\Model\Category;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends RestController{

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
		$category = Category::findAll();
		$category['massege'] = 'result find';
		$result = json_encode($category);
		return new Response($result, 200, array('Content-Type'=>'text/json'));
	}

	function getOneAction($id) {
		$category = Category::findById($id);
		if(is_null($category)){
			$category['massege'] = 'no result';
		} else {
			$category['massege'] = 'result find';
		}

		$result = json_encode($category);	
		return new Response($result, 200, array('Content-Type'=>'text/json'));
	}

	function postAction() {	
		$category = new Category();
		$category->name = $_POST['name'];
		$category->parent_id = $_POST['parent_id'];
		$result = $category->save();		
		return new Response($result);
	}
	
	function putAction(Request $req, $id){
/* 		parse_str($req->getContent(), $put);		
		$phone = new Phone();
		$phone->id = $id;
		$phone->name = $put['name'];
		$phone->position = $put['position'];
		$phone->inner_phone = $put['inner_phone'];
		$phone->outer_phone = $put['outer_phone'];
		$phone->auditory = $put['auditory'];
		$phone->email = $put['email'];
		$phone->category_id = $put['category_id'];
		$result = $phone->save();
		return $result; */
	}
	
	function deleteAction($id) {
 		$category = new Category();
		$result = $category->remove((int) $id);
		return new Response($result); 
	}

}
