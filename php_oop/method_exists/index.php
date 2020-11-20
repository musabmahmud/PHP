<?php 

	class teacher{
		public function school(){
			echo "Method Exists<br>School Teacher";
		}
	}
	if(class_exists("teacher")){
		$th = new teacher();
		if(method_exists($th, 'school')){
			$th->school();
		}
		else
		{
			echo "Method Not Found!";
		}
	}
	else{
		echo "Method Doesn't Exists";
	}



 ?>