<?php

namespace app\models;

class AbstractModel
{
	protected \mysqli $db;

    /**
     * initializes the database connection when the class object is created
     */

	public function __construct()
	{
		$this->db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if($this->db->connect_errno != 0){
			exit($this->db->connect_error);
		}
	}

    /**
     * @return void
     * checks the result
     */

	public function checkResult($result) : void
	{
		if(!$result){
			exit($this->db->error);
		}
	}


}