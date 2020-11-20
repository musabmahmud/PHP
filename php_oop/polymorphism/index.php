<?php 

class teacher{
	public	$class;
	public 	$id;
		public function __construc($name,$id){
			echo "Class : {$class}<br>
				Id : {$id}<br>";
		}
}
class User extends teacher{
	public $level = "Gardains";
	public function show(){
		echo "User is {$this->class} and<br> Id : {$this->id}<br> Role : $this->level";
	}
}

	$class = "English";
	$id = "18";
	$musab = new teacher();
	$musab->show($class,$id);
	$sinmim = new User();
	$sinmim->show();

 ?>