<?php

namespace App\Model;

class Model {
	
	private static $pdo;

	protected static function getPDO() {
		if(empty(self::$pdo)) {
			self::$pdo = new \PDO('sqlite:./../config/phonebook.db');
		} 
		return self::$pdo;
	}
	
	function findAll(){
		$tableName = $this->getTableName();
		
		$result = array('massege'=>'result find');
		$query = Model::getPDO()->query("SELECT * FROM ".$tableName);
		
		while($row = $query->fetch(\PDO::FETCH_ASSOC)) {
			$result[result][] = $row;
		}
		return json_encode($result);
	}
	
	function findById($id) {
		$tableName = $this->getTableName();
		$id = (int) $id;
		
		$query = Model::getPDO()->query("SELECT * FROM ".$tableName." WHERE id = ".$id);
		
		if ($result = $query->fetch(\PDO::FETCH_ASSOC)) {	
			return '{"massege":"result find", "resalt": ' .json_encode($result). '}';	
		} else {
			return '{"massege":"no result find"}';
		}
	}
	
	function save($data){
		$tableName = $this->getTableName();
		$vars = get_object_vars($this);
		
		echo '<pre>';
		print_r($vars);
		echo '</pre>';
		
		$attrString = $this->getAttrString($vars, array('', ', '));
		$propString = $this->getAttrString($vars, array(':', ', '));
		
		$correctVars = $this->getCorrectVars($vars);

		$stmt = Model::getPDO()->prepare("INSERT INTO $tableName ($attrString) VALUES ($propString)");
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