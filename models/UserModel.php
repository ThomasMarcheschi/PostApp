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

       static function fetchProfil($email): array{
        $connect = DB::getConnection();

        $stmt = $connect -> getConnect() -> prepare('SELECT * FROM users WHERE email=?');
        $stmt -> bindParam(1,$email);
        $res = $stmt -> execute();

        $userFromDB = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $userFromDB;
      }

      static function fetchByID($id){
        $connect = DB::getConnection();
    
        $stmt = $connect -> getConnect() -> prepare('SELECT * FROM users WHERE id=?');
    
        $stmt -> bindParam(1, $id);
        $res = $stmt ->execute();
        $userFromDB = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $userFromDB;
      }
    
      function saveAvatarToDB($avatar){
        $stmt = $this -> getConnect() -> prepare("UPDATE users SET avatar=? WHERE email=?");
        $stmt ->bindParam(1, $avatar);
        $stmt ->bindParam(2, $this -> email);
        $stmt ->execute();
      }

      function saveCouvertureToDB($couverture){
        $stmt = $this -> getConnect() -> prepare("UPDATE users SET imageCouverture=? WHERE email=?");
        $stmt ->bindParam(1, $couverture);
        $stmt ->bindParam(2, $this -> email);
        $stmt ->execute();
      }
    }