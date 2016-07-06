<?php

namespace Phonebook\Model;

use App\Model\Model;
use App\Model\ModelInterface;

class Category extends Model implements ModelInterface {

	public $name;
	public $parent_id = 0;
	
	static function getTableName() {
		return 'categories';
	}
}