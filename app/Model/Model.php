<?php

namespace App\Model;

use App\DI\Service;

class Model {
	
	private static $pdo;

	private static function getPDO() {
		if(empty(self::$pdo)) {
			self::$pdo = new \PDO(Service::get('config')['pdo']);
		} 
		return self::$pdo;
	}
	
	static function findAll(){
		$tableName = static::getTableName();
		
		$result = array();
		$query = Model::getPDO()->query("SELECT * FROM ".$tableName);
		
		while($row = $query->fetch(\PDO::FETCH_ASSOC)) {
			$result['result'][] = $row;
		}
		return $result;
	}
	
	static function findById($id) {
		$tableName = static::getTableName();
		$id = (int) $id;
		
		$query = Model::getPDO()->query("SELECT * FROM ".$tableName." WHERE id = ".$id);
		
		if ($result = $query->fetch(\PDO::FETCH_ASSOC)) {	
			return array('result' => $result);	
		} else {
			return null;
		}
	}
	
	function remove($id) {
		$tableName = static::getTableName();
		
		Model::getPDO()->exec("DELETE FROM $tableName WHERE id = $id");
		
		return 'Information delete';
	}
	
	function save(){
		$tableName = static::getTableName();
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
		
		if(!empty($vars['id'])) {
			foreach ($vars as $key=>$val) {
				if ($key != 'id') {
					if ($valString == '') {
						$valString .= $key.' = :'.$key;
					} else {
						$valString .= ', '.$key.' = :'.$key;
					}
				}
			}
			$queryString = 'UPDATE '.$tableName.' SET '.$valString.' WHERE id = :id';
			
		} else {
			foreach ($vars as $key=>$val) {
				if ($valString == '') {
					$valString .= ':'.$key;
				} else {
					$valString .= ', :'.$key;
				}
			}
			$attrString = str_replace(':', '', $valString);
			
			$queryString = 'INSERT INTO '.$tableName.' ('.$attrString.') VALUES ('.$valString.')';
		}

		return $queryString;
	}

}