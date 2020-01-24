<?php

namespace Application\Model;

use PDO;

class Setup
{
	/**
	 * @return PDO
	 */
	public function databaseConnection()
	{
		$dsn = 'mysql:host=localhost;dbname=todoliste;charset=utf8';
		$result = new PDO($dsn, 'root', null);
		return $result;
	}
}
