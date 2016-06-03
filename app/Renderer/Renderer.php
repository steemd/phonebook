<?php

namespace App\Renderer;

class Renderer {
	
	private $path;

	function __construct($tmpl, $dir){
		$this->path = __DIR__.'/../../src/Phonebook/Views/'.$dir.'/'.$tmpl.'.php';
	}

	public function getContent(){
		ob_start();
		include $this->path;
		$result = ob_get_contents();
		ob_clean();
		
		return $result;
	}
}