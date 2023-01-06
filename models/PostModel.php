<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/models/DB.php";

class PostModel extends DB{
    private $content;
    private $titre;
    private $usernameID;
    private $id;
    private $imagePost;

    function __construct($postContent,$postTitle,$postImage,$usernameID){
        parent::__construct();
        $this -> content = $postContent;
        $this -> titre = $postTitle;
        $this -> imagePost = $postImage;
        $this -> usernameID = $usernameID;    
        }

        function addPost(){
            
            $stmt = $this -> getConnect() -> prepare("INSERT INTO post (titre,content,imagePost,usernameID) VALUES (?,?,?,?)");
        
            $stmt -> bindParam(1, $this -> titre);
            $stmt -> bindParam(2, $this -> content);
            $stmt -> bindParam(3, $this -> imagePost);
            $stmt -> bindParam(4, $this -> usernameID);
        
            $stmt -> execute();
            $this -> id =  $this -> getConnect() -> lastInsertId();
        
            return $this -> fetch();
          }


          function fetch(){
            $stmt = $this -> getConnect() -> prepare("SELECT * FROM post WHERE id=?");
            $stmt -> bindParam(1, $this ->id);
            $stmt -> execute();
            return $stmt -> fetch(PDO::FETCH_ASSOC);
          }

          static function fetchAll($usernameID){
            $connect = DB::getConnection();
            $stmt = $connect -> getConnect() -> prepare("SELECT * FROM post WHERE usernameID=?");
            $stmt -> bindParam(1,$usernameID);
            $stmt -> execute();
            return $stmt -> fetchAll(PDO::FETCH_ASSOC);
          }
}