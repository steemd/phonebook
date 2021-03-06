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
		$categories = Category::findAll();
		return $this->render('add.html', array('categories' => $categories['result']));
	}
	
	function renderUpdateAction($id) {
		$category = Category::findById($id);
		$categories = Category::findAll();
		return $this->render('update.html', array('category' => $category['result'], 'categories' => $categories['result']));
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
 		parse_str($req->getContent(), $put);
		
		$category = new Category();
		$category->id = $id;
		$category->name = $put['name'];
		$category->parent_id = $put['category_id'];
		$result = $category->save();
		return new Response($result); 
	}
	
	function deleteAction($id) {
 		$category = new Category();
		$result = $category->remove((int) $id);
		return new Response($result); 
	}

}
