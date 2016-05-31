<?php

namespace App\Model;

class Model {
	
	private $pdo;
	
	function __construct(){
		$this->pdo = new \PDO('sqlite:./../config/phonebook.db');
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
	
	function save($tableName, $data){
		$stmt = $this->pdo->prepare("INSERT INTO phones(name, position, inner_phone, outer_phone, auditory, email, category_id) VALUES (:name, :position, :inner_phone, :outer_phone, :auditory, :email, :category_id)");
		
		$stmt->bindParam(':name', $data[name], \PDO::PARAM_STR);
		$stmt->bindParam(':position', $data[position], \PDO::PARAM_STR);
		$stmt->bindParam(':inner_phone', $data[inner_phone], \PDO::PARAM_STR);
		$stmt->bindParam(':outer_phone', $data[outer_phone], \PDO::PARAM_STR);
		$stmt->bindParam(':auditory', $data[auditory], \PDO::PARAM_STR);
		$stmt->bindParam(':email', $data[email], \PDO::PARAM_STR);
		$stmt->bindParam(':category_id',  $data[category_id], \PDO::PARAM_INT);
		
		$stmt->execute();
		return 'information saved';
	}
	
}