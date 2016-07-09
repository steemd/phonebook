<?php

namespace App\Controller;

use App\Renderer\Renderer;
use Symfony\Component\HttpFoundation\Response;

class Controller {

	function render($tmpl, $data = array()){
		$controllerNamespace = explode('\\', get_called_class());
		$controllerName = array_pop($controllerNamespace);
		$dir = str_replace('Controller', '', $controllerName);
		
		$renderer = new Renderer($tmpl, $dir);
		$content = $renderer->getContent($data);
		
		return new Response($content, 200);
	}

}