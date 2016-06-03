<?php

namespace Phonebook\Model;

use App\Model\Model;
use App\Model\ModelInterface;

class Phone extends Model implements ModelInterface {

	public $name;
	public $position;
	public $inner_phone;
	public $outer_phone;
	public $auditory;
	public $email;
	public $category_id;
	
	function getTableName() {
		return 'phones';
	}

}