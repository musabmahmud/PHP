<?php

Class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
    
    public $link;
    public $error;

    public function __construct(){
        $this->connectDB();
    }

    private function connectDB(){
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        if(!$this->link){
            $this->error = "Connection Fail".$this->link->connect_error;
            return false;            
        }
    }
    //Insert Data
    public function select($query){
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
        if($result -> num_rows > 0){
            return $result;
        }
        else{
            return false;
        }
    }
    //Read Data
    public function insert($query){
        $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($insert_row){
            header("Location: index.php?msg=".urlencode('Data Inserted Successfully.'));
            exit();
        }
        else{
            die("ERROR : (".$this->link->erron.")".$this->link->error);
        }
    }

    //Update Data
    public function update($query){
        $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($update_row){
            header("Location: index.php?msg=".urlencode('Data Updated Successfully.'));
            exit();
        }
        else{
            die("ERROR : (".$this->link->erron.")".$this->link->error);
        }
    }
    //Delete Data
    public function delete($query){
        $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
        if($delete_row){
            header("Location: index.php?msg=".urlencode('Data Deleted Successfully.'));
            exit();
        }
        else{
            die("ERROR : (".$this->link->erron.")".$this->link->error);
        }
    }
}

?>