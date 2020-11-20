<?php include 'header.php';

	class programming{
		public $html;
		public $css;
		private $php;
		protected $java;
		function __construct(){
			$this->html = "I know HTML";
			$this->css 	= "I know CSS";
			$this->php  = "I'm php Coder";
			$this->java = "Too much Easier for mobile apps";
		}
	}

	$pro = new programming();
	$ser = serialize($pro);
	file_put_contents("programming.txt", "$ser");
	echo $ser;


	$getcont = file_get_contents("programming.txt");
	$unser = unserialize($getcont);
	echo "<pre>";
	print_r($unser);
	echo "</pre>";

 

 include 'footer.php';
 ?>