<?php

namespace Phonebook\Controller;

use App\App;
use App\Controller\Controller;
use Phonebook\Model\Page;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController extends RestController{

	function renderListAction() {
		return $this->render('list.html');
	}
	
	function renderAddAction() {
		$page = Page::findAll();
		return $this->render('add.html', array('page' => $page['result']));
	}
	
	function renderUpdateAction($id) {
		$page = Page::findById($id);
		return $this->render('update.html', array('page' => $page['result']));
	}
	//REST
	function getAction() {
		$pages = Page::findAll();
		$pages['massege'] = 'result find';
		$result = json_encode($pages);
		return new Response($result, 200, array('Content-Type'=>'text/json'));
	}

	function getOneAction($id) {
		$page = Page::findById($id);
		if(is_null($page)){
			$page['massege'] = 'no result';
		} else {
			$page['massege'] = 'result find';
		}
		$result = json_encode($page);	
		return new Response($result, 200, array('Content-Type'=>'text/json'));
	}

	function postAction() {	
		$page = new Page();
		$page->title = $_POST['title'];
		$page->text = $_POST['text'];
		$result = $page->save();		
		return new Response($result);
	}
	
	function putAction(Request $req, $id){
 		parse_str($req->getContent(), $put);
		
		$page = new Page();
		$page->id = $id;
		$page->title = $put['title'];
		$page->text = $put['text'];
		$result = $page->save();
		return new Response($result); 
	}
	
	function deleteAction($id) {
 		$page = new Page();
		$result = $page->remove((int) $id);
		return new Response($result); 
	}

}
