<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/models/PostModel.php";

class PostController{
    private $id;
    private $titre;
    private $content;
    private $imagePost;
    private $date;
    private $usernameID;

    private $postModel;

    function __construct($postContent,$postTitle,$postImage,$usernameID){
        $this -> content = $postContent;
        $this -> titre = $postTitle;
        $this -> imagePost = $postImage;
        $this -> usernameID = $usernameID;    
        $this -> postModel = new PostModel($postContent,$postTitle,$postImage,$usernameID);
        }

    function addPost(){
        $postTab = $this -> postModel -> addPost();
        $this -> date = $postTab['date'];
        $this -> id = $postTab['id'];
    }
}