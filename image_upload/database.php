<?php
/**
 * 
 */
class Database{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $dbname = DB_Name;

	public $link;
	public $error;

	function __construct()
	{
		$this->connectDB();
	}


	private function connectDB(){
		$this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
		if(!$this->link ){
			$this->error = "Connection Failed.".$this->link->connect_error;
		}
	}

	public function insert($data){
		$insert = $this->link->query($data) or die($this->link->error.__LINE__);
		if($insert){
			return $insert;
		}
		else{
			return false;
		}
	}


	public function select($data){
		$select = $this->link->query($data) or die($this->link->error.__LINE__);
		if($select->num_rows > 0){
			return $select;
		}
		else{
			return false;
		}
	}


	public function delete($data){
		$delete = $this->link->query($data) or die($this->link->error.__LINE__);
		if($delete){
			return $delete;
		}
		else{
			return false;
		}
	}
}
?>