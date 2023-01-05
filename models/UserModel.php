<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/models/DB.php";

class UserModel extends DB{
    private $email;
    private $password;
    private $username;

    function __construct($email,$password,$username){
        parent::__construct();
        $this -> email = $email;
        $this -> password = $password;
        $this -> username = $username;
    }

    function addToDB(){
        $stmt= $this-> getConnect() -> prepare('INSERT INTO users (email, password ,username) VALUES (?,?,?)');

        $stmt -> bindParam(1, $this -> email);
        $stmt -> bindParam(2, $this -> password);
        $stmt -> bindParam(3, $this -> username);

        $stmt -> execute();

    }

    function fetch() : array {
        $stmt = $this -> getConnect() -> prepare('SELECT * FROM users WHERE email=? || username=?');
    
        $stmt -> bindParam(1, $this ->email);
        $stmt -> bindParam(2, $this ->username);
    
        $res = $stmt -> execute();
        
        $userFromDB = $stmt -> fetch(PDO::FETCH_ASSOC);
    
        if(is_bool($userFromDB)){
          return [];
        }
        
        return $userFromDB;
      }

    
}