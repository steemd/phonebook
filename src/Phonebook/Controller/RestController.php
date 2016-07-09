<?php

namespace Phonebook\Controller;

use App\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

abstract class RestController extends Controller{
	
	abstract function getAction();
	abstract function getOneAction($id);
	abstract function postAction();
	abstract function putAction(Request $req, $id);
	abstract function deleteAction($id);

}