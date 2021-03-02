<?php
	class Session{
	public static function init(){
		if(version_compare(phpversion(), '5.4.0', '<')){
			if(session_id() == ''){
				session_start();
			}
		}
		else{
			if(session_status() == PHP_SESSION_NONE){
					session_start();
			}		
		}
	}
	public static function set($key, $val){
		$_SESSION[$key] = $val;
	}
	public static function get($key){
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}
		else{
			return false;
		}
	}

	public static function checkSession(){
		if(self::get("login") == false){
			self::destroy();		}
	}

	public static function checkLogin(){
		if(self::get("login") == true){
		header("location: index.php");		}
	}
	public static function destroy(){
		Session_destroy();
		Session_unset();
		header("location: login.php");
	}
}
?>