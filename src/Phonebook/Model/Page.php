<?php

namespace Phonebook\Model;

use App\Model\Model;
use App\Model\ModelInterface;

class Page extends Model implements ModelInterface {

	public $title;
	public $text;
	
	static function getTableName() {
		return 'pages';
	}
}