<?php include 'header.php';
	//function __autoload($class_name){}
	spl_autoload_register(function($class_name)
	{
		include "files/".$class_name.".php";
	});


	$java = new java();
	$c = new c();
	$html = new html();

	

 include 'footer.php';
 ?>