<?php
	include "confiq.php";
	class DB{
		private static $pdo;
		public static function connection(){
			if(!isset(self::$PDO)){
				try{
					self::$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
				}
				catch(PDOException $e){
					echo $e->getMessage();
				}
			}
			return self::$pdo;
		}
		public static function prepare($sql){
			return self::connection()->prepare($sql);
		}
	}
?>