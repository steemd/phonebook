<?php

namespace App\Model;

class Model {
	
	private $pdo;
	
	function __construct(){
		$this->pdo = new \PDO('sqlite:phonebook.db');
	}
	
	function getAll($tableName){
		
		$resalt = 'List of '.$tableName;
		
		$resalt .= '<ul>';
		foreach ($this->pdo->query("SELECT * FROM ".$tableName) as $row) {
			$resalt .= '<li> ID - '.$row[id].'; Name - '.$row[name].'</li>';
		}
		$resalt .= '</ul>';
		
		return $resalt;
	}
	
}