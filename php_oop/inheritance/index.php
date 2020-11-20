<?php 	include 'header.php'; 

class userData{
		public $user;
		public $id;

		public function __construct($name,$roll){
			$this->user = $name;
			$this->id = $roll;
			
			echo "Name : $this->user,<br> ID : {$this->id}<br>";
		}
	}
//Can extends here
class Admin extends userData
{
}
//Can over-write here
class Panel extends userData{
	public function __construct($name,$roll){

	}
}

	$user = "musab";
	$id   = "23";
	$ur = new userData($user,$id);

	$user = "Sinmim";
	$id = "20";
	$admin = new Admin($user,$id);
		include 'footer.php'; 
?>