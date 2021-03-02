<?php
	include_once 'session.php';
	include 'database.php';
	
class User{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}
	public function userRegistration($data){
		$name = $data['name'];
		$username = $data['username'];
		$email = $data['email'];
		$password = $data['password'];
		$conpassword = $data['conpassword'];
		$regex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$";


		$chk_email = $this->emailCheck($email);

		if($name == "" || $username  == "" || $email == "" ||  $password == "" || $conpassword == ""){
			$msg = "<div class='alert alert-danger'>Field Must not be Empty</div>";
			return $msg;
		}
		if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$msg = "<div class='alert alert-danger'>Please Enter Valid Name</div>";
			return $msg;
	     }
		if(!preg_match("/^[a-zA-Z-_]{3,20}$/",$username)) {
				$msg = "<div class='alert alert-danger'>Please Enter Valid USER Name with 3 character!</div>";
			return $msg;
	       }
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			$msg = 
  "<div class='alert alert-danger'>
    <strong>Please Enter a valid Email</div>";
			return $msg;
		}
		if($chk_email == true){
			$msg = "<div class='alert alert-danger'><strong>Email! already exist</strong></div>";
			return $msg;
		}
		if(!preg_match($regex, $password)){
			$msg = "<div class='alert alert-danger'><strong>Password Doesn't Same</strong></div>";
			return $msg;
		}
		if($password != $conpassword){
			$msg = "<div class='alert alert-danger'><strong>Password Doesn't Same</strong></div>";
			return $msg;
		}

		$password = md5($data['password']);
		$sql = "INSERT INTO regi (name,username,email,password) VALUES(:name,:username,:email,:password)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$result = $query->execute();
		if($result){
			$msg = "<div class='alert alert-success'><strong>Data Inserted successfully</strong></div>";
			return $msg;
		}
		else{
			$msg = "<div class='alert alert-danger'><strong>Failed! Try again</strong></div>";
			return $msg;
		}
	}


	public function emailCheck($email){
		$sql = "SELECT * FROM regi WHERE email = :email";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->execute();
		if($query->rowCount() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	public function getLoginUser($email,$password){
		$sql = "SELECT * FROM regi WHERE email = :email AND password = :password";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function userLogin($data){
		$email = $data['email'];
		$password = $data['password'];

		$regex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$";

		$chk_email = $this->emailCheck($email);

		if($email == "" ||  $password == ""){
			$msg = "<div class='alert alert-danger'>Field Must not be Empty</div>";
			return $msg;
		}
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			$msg = "<div class='alert alert-danger'><strong>Please Enter a valid Email</div>";
			return $msg;
		}
		if($chk_email == false){
			$msg = "<div class='alert alert-danger'><strong>Email! already exist</strong></div>";
			return $msg;
		}
		$result = $this->getLoginUser($email,$password);
		if($result){
			Session::init();
			Session::set("login",ture);
			Session::set("id", $result->id);
			Session::set("name", $result->name);
			Session::set("username", $result->username);
			Session::set("loginmsg", "<div class='alert alert-success'>successfully login</div>");
			header("Location: index.php");
		}
		else{
			$msg = "<div class='alert alert-danger'>Data not Found</div>";
			return $msg;
		}

	}
	public function getUserData(){
		$sql = "SELECT * FROM regi ORDER BY id ASC";
		$query = $this->db->pdo->prepare($sql);
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}
	public function getUserbyId($id){
		$sql = "SELECT * FROM regi WHERE id = :id limit 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id', $id);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}
	public function updateUsr($id,$data){
		$name = $data['name'];
		$username = $data['username'];
		$email = $data['email'];

		if($name == "" || $username  == "" || $email == ""){
			$msg = "<div class='alert alert-danger'>Field Must not be Empty</div>";
			return $msg;
		}
		if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$msg = "<div class='alert alert-danger'>Please Enter Valid Name</div>";
			return $msg;
	     }
		if(!preg_match("/^[a-zA-Z-_]{3,20}$/",$username)) {
				$msg = "<div class='alert alert-danger'>Please Enter Valid USER Name with 3 character!</div>";
			return $msg;
	       }
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			$msg =  "<div class='alert alert-danger'>
    <strong>Please Enter a valid Email</div>";
			return $msg;
		}

		$sql = "UPDATE regi SET name = :name, username = :username, email = :email WHERE id = :id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id',$id);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$result = $query->execute();
		if($result){
			$msg = "<div class='alert alert-success'><strong>Data Updated successfully</strong></div>";
			return $msg;
		}
		else{
			$msg = "<div class='alert alert-danger'><strong>Failed! Try again</strong></div>";
			return $msg;
		}

	}


	private function chk_pass($id, $old_pass){
		$password = $old_pass;
		$sql = "SELECT password FROM regi WHERE id=:id AND password = :password";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id',$id);
		$query->bindValue(':password',$password);
		$query->execute();
		if($query->rowCount() > 0){
			return true;
		}
		else{
			return false;
		}
	}


	public function updatePass($id,$data){
		$old_pass = $data['old_pass'];
		$new_pass = $data['password'];
		$con_pass = $data['con_pass'];

		$regex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$";

		$chk_pass = $this->chk_pass($id, $old_pass);

		if($old_pass == "" || $new_pass  == "" || $con_pass == ""){
			$msg = "<div class='alert alert-danger'>Field Must not be Empty</div>";
			return $msg;
		}

		if($chk_pass == false){
			$msg = "<div class='alert alert-danger'><strong>Old Password Doesn't Match!!</strong></div>";
			return $msg;
		}

		if(!preg_match($regex, $password)){
			$msg = "<div class='alert alert-danger'><strong>Password Doesn't Same</strong></div>";
			return $msg;
		}
		if($password != $conpassword){
			$msg = "<div class='alert alert-danger'><strong>Password Doesn't Same</strong></div>";
			return $msg;
		}

		$password = md5($data['password']);
		$sql = "UPDATE regi SET password = :password WHERE id = :id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id',$id);
		$query->bindValue(':password',$new_pass);
		$result = $query->execute();
		if($result){
			$msg = "<div class='alert alert-success'><strong>Password Updated successfully</strong></div>";
			return $msg;
		}
		else{
			$msg = "<div class='alert alert-danger'><strong>Failed! Try again</strong></div>";
			return $msg;
		}

	}
}


?>