<?php
	class Database{
		public $host = 'localhost';
		public $user = 'root';
		public $pass = '';
		public $dbname = 'login_form';

		public $link;
		public $error;

		public function __construct(){
			$this->connectDB();
		}

		private function connectDB(){
			$this->link =  new mysqli($this->host,$this->user,$this->pass,$this->dbname);
			if(!$this->link){
				$this->error = "Connection Failed".$this->link->connect_error;
				return false;
			}
		}

		public function select($query){
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if($result->num_rows >0){
				return $result;
			}
			else{
				return false;
			}
		}

		public function create($query){
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if(isset($result)){
		      header("Location: index.php");
		      exit();
		    }
			else{
				die("ERROR : (".$this->link->errno.")".$this->link->error);
			}
		}
		public function update($query){
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if(isset($result)){
		      header("Location: index.php");
		      exit();
		    }
			else{
				die("ERROR : (".$this->link->errno.")".$this->link->error);
			}
		}
		public function delete($query){
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if($result == true){
		      header("Location: index.php");
		      exit();
		    }
			else{
				die("ERROR : (".$this->link->errno.")".$this->link->error);
			}
		}
	}
?>