<?php

namespace App\Model;

use App\DI\Service;

class Model {
	
	private static $pdo;

	protected static function getPDO() {
		if(empty(self::$pdo)) {
			self::$pdo = new \PDO(Service::get('config')['pdo']);
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
	
	function remove($id) {
		$tableName = $this->getTableName();
		
		Model::getPDO()->exec("DELETE FROM $tableName WHERE id = $id");
		
		return 'Information delete';
	}
	
	function save(){
		$tableName = $this->getTableName();
		$vars = get_object_vars($this);
		$varsData = array();

		$queryString = $this->getQueryString($vars, $tableName);

		$stmt = Model::getPDO()->prepare($queryString);

		foreach ($vars as $key=>$val) {
			$varsData[':'.$key] = $val ? $val : '';
		}
		if ($stmt->execute($varsData)) {
			return 'information saved';
		}
			return 'Error :(';
	}
	
	private function getQueryString($vars, $tableName) {
		$valString = '';

		foreach ($vars as $key=>$val) {
			if ($valString == '') {
				$valString .= ':'.$key;
			} else {
				$valString .= ', :'.$key;
			}
		}
		$attrString = str_replace(':', '', $valString);
		
		return 'INSERT INTO '.$tableName.' ('.$attrString.') VALUES ('.$valString.')';
	}

}