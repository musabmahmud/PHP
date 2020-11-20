<?php 	include 'header.php'; 

class userData{
		public $user;
		public $id;

		public function __construct($name,$roll){
			$this->user = $name;
			$this->id = $roll;
			
			echo "Name : ".$this->user.",<br> ID : {$this->id}";
		}
		public function __destruct(){
			unset($this->user);
			unset($this->id);
		}
	}

	$user = "musab";
	$id   = "18";
	$ur = new userData($user,$id);

		include 'footer.php'; 
?>