<?php

namespace App\Model;

class Model {
	
	private $pdo;
	
	function __construct(){
		$this->pdo = new \PDO('sqlite:./../config/phonebook.db');
	}
	
	function findAll(){
		$tableName = $this->getTableName();
		
		$result = array('massege'=>'result find');
		$query = $this->pdo->query("SELECT * FROM ".$tableName);
		
		while($row = $query->fetch(\PDO::FETCH_ASSOC)) {
			$result[result][] = $row;
		}
		return json_encode($result);
	}
	
	function findById($id) {
		$tableName = $this->getTableName();
		$id = (int) $id;
		
		$query = $this->pdo->query("SELECT * FROM ".$tableName." WHERE id = ".$id);
		
		if ($result = $query->fetch(\PDO::FETCH_ASSOC)) {	
			return '{"massege":"result find", "resalt": ' .json_encode($result). '}';	
		} else {
			return '{"massege":"no result find"}';
		}
	}
	
	function save($data){
		$tableName = $this->getTableName();
		$vars = get_object_vars($this);
		
		$attrString = $this->getAttrString($vars, array('', ', '));
		$propString = $this->getAttrString($vars, array(':', ', '));
		
		$correctVars = $this->getCorrectVars($vars);

		$stmt = $this->pdo->prepare("INSERT INTO $tableName ($attrString) VALUES ($propString)");
		foreach ($correctVars as $key=>$val) {
			$stmt->bindParam(':'.$key, $data[$key]);
		}
		$stmt->execute();
		
		return 'information saved';
	}

	
	private function getAttrString($arr, $separators) {
		$result = '';
		foreach ($arr as $key=>$val) {
			if (empty($val)){
				if ($result == '') {
					$result .= $separators[0].''.$key;
				} else {
					$result .= $separators[1].''.$separators[0].''.$key;
				}
			}	
		}
		return $result;
	}
	
	private function getCorrectVars($vars) {
		$result = array();
		foreach ($vars as $key=>$val) {
			if (empty($val)){
				$result[$key] = $val;
			}
		}
		
		return $result;
	}
	
}