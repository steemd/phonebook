<?php

namespace App\Renderer;

class Renderer {
	
	private $path;
	private $main;

	function __construct($tmpl, $dir){
		$this->main = __DIR__.'/../../src/Phonebook/Views/main.html.php';
		$this->path = __DIR__.'/../../src/Phonebook/Views/'.$dir.'/'.$tmpl.'.php';
	}

	public function getContent($data = array()){
		extract($data);
		ob_start();
		include $this->path;
		$content = ob_get_contents();
		ob_clean();
		
		ob_start();
		include $this->main;
		$result = ob_get_contents();
		ob_clean();
		
		return $result;
	}
}