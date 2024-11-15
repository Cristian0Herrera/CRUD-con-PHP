<?php

class all_in_one_classes
{
    public $localhost = "localhost";
    public $username = "root";
    public $dbName = "php_all_in_one";
    public $password = "";
    public $conn;

    function __construct(){
        
        //now to prevent SQL Injection, you must use PDO. PHP data object
        $this->conn = new mysqli($this->localhost,$this->username, $this->password,$this->dbName);
        if($this->conn->connect_error){
            die("connection fail: " . mysqli_connect_error());
        }
        else{
            echo"connected";
        }
    }

    function registration($n,$e,$p,$f){


        $reg = "INSERT INTO users(name,email,password,telefono) VALUES('$n','$e','$p','$f')";
        if(!mysqli_query($this->conn,$reg)){
            echo'Data dose not save';
        }
        else{
            echo"Data Save Sucessfully";
        }
    }

    function dataShow(){
        $show = "SELECT * FROM users";
        $ret = mysqli_query($this->conn,$show);
        return $ret;
    }

    function dataDelete($id){
        $delete = "DELETE FROM users where id='$id'";
        $del = mysqli_query($this->conn,$delete);
        return $del;
    }
    function dataShowForUpdate($id){
        $update = "SELECT * FROM users WHERE id='$id'";
        $up = mysqli_query($this->conn,$update);
        return $up;
    }
    function dataUpdate($id,$n,$e,$p,$f){

        $reg = "UPDATE users SET name='$n',email='$e',password='$p',telefono='$f' WHERE id='$id'";
        if(!mysqli_query($this->conn,$reg)){
            echo'Data dose not Update';
        }
        else{
            $_SESSION['update'] = "Data Update Succssfully";
            echo"<script>window.location.href='all_users.php'</script>";
        }
    }

    function login($e,$p){
        $login = "SELECT * FROM users WHERE email='$e' and password='$p'";
        $log = mysqli_query($this->conn,$login);
        return $log;
    }
}
