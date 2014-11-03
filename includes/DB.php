<?php

class DB {
	
	private $_mysqli = null;
	private $_query = null;
	private $_results = array();
	
	public static $instance;
	
	public static function getInstance()
	{
		if(!isset(self::$instance))
		{
			self::$instance = new DB();
		}
		return self::$instance;
	}
	
	public function __construct()
	{
		$this->setConnection("root", "", "etik_cms");
		
		if($this->_mysqli->connect_error){
			die('Unable to connect to database [' . $this->_mysqli->connect_error . ']');
		}
	}

	public function setConnection($user, $password, $database, $host = 'localhost')
	{
		$this->_mysqli = new mysqli($host, $user, $password, $database);
	}

	// Get mysqli connection
	public function getConnection() 
	{
		return $this->_mysqli;
	}

	// Get mysqli connection
	public function getError() 
	{
		return $this->_mysqli->error;
	}

	/* ASSOCIATED WITH "query()" METHOD
		FUNCTIONS:
		->fetch_assoc();
		->fetch_object(); //equivalent with: select();
		->fetch_row();
		->fetch_array(); //param: MYSQLI_ASSOC, MYSQLI_NUM, MYSQLI_BOTH
		//converts the entire collection to an array, no need for while loop
		->fetch_all();   //param: MYSQLI_ASSOC, MYSQLI_NUM, MYSQLI_BOTH
		
		PROPERTIES:
		->num_rows;//on SELECT
		->insert_id;//on INSERT
		->affected_rows;//on INSERT, UPDATE and DELETE
	*/	
	public function query($sql)
	{
		if($this->_query = $this->_mysqli->query($sql))
		{
			$this->_length = $this->_query->num_rows;
			return $this->_query;
		}
		return null;
	}
	
	public function select($sql)
	{
		if($this->_query = $this->_mysqli->query($sql))
		{
			while($row = $this->_query->fetch_object())
			{	
				$this->_results[] = $row;
			}
			return $this->_results;
		}
		return null;
	}
	
	/* ASSOCIATED WITH "query_prep()" METHOD
		FUNCTIONS:
		->bind_result();//on SELECT
		->get_result();//on SELECT
		->fetch();
	
		PROPERTIES:
		->num_rows;//on SELECT
		->insert_id;//on INSERT
		->affected_rows;//on INSERT, UPDATE and DELETE

	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	*/
	public function query_prep($sql, $bind_param_values, $bind_param_format='')
	{
		$statement = $this->_mysqli->prepare($sql);
		 
		if(!is_array($bind_param_values))
			$bind_param_values = array($bind_param_values);

		if($bind_param_format == "")
		{
			foreach($bind_param_values as $data)
			{
				if(is_int($data))
					$bind_param_format .= "i";
				else if(is_double($data))
					$bind_param_format .= "d";
				else
					$bind_param_format .= "s";
			}
		}

		echo $bind_param_format;

		array_unshift($bind_param_values, $bind_param_format);
		
		//Dynamically bind values
		call_user_func_array( array( $statement, 'bind_param'), $this->ref_values($bind_param_values));
		
		if($statement->execute())
		{
			return $statement;
		}

		return null;
	}	
	
	public function select_prep($sql, $bind_param_values, $bind_param_format='')
	{
		$statement = $this->query_prep($sql, $bind_param_values, $bind_param_format);

		if ($result = $statement->get_result())
		{
			while($row = $result->fetch_assoc())
			{	
				$this->_results[] = $row;
			}
			return $this->_results;
		}
		return null;
	}

	private function ref_values($array) 
	{
		$refs = array();
		
		foreach ($array as $key => $value) 
		{
			$refs[$key] = &$array[$key];
		}
		
		return $refs;
	}

	//prevent SQL injection
	public function escape($value)
	{
		return $this->_mysqli->real_escape_string($value);
	}

	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }

}
