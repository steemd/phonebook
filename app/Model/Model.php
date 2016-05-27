<?php

namespace App\Model;

class Model {
	
	private $pdo;
	
	function __construct(){
		$this->pdo = new \PDO('sqlite:phonebook.db');
	}
	
	function getAll($tableName){
		
		$result = array('massege'=>'result find');
		
		$query = $this->pdo->query("SELECT * FROM ".$tableName);
		
		while($row = $query->fetch(\PDO::FETCH_ASSOC)) {
			$result[result][] = $row;
		}

		return json_encode($result);
	}
	
	function getById($tableName, $id) {
		
		$query = $this->pdo->query("SELECT * FROM ".$tableName." WHERE id = ".$id);
		
		if ($result = $query->fetch(\PDO::FETCH_ASSOC)) {	
			return '{"massege":"result find", "resalt": ' .json_encode($result). '}';	
		} else {
			return '{"massege":"no result find"}';
		}
		
	}
	
}