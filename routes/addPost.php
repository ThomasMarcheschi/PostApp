<?php 
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/controllers/UserController.php";


if(isset($_POST['titre']) && isset($_POST['content'])){
    $userController = UserController::createUserFromId($_SESSION['id']);
    $userController -> addPost($_POST['content'],$_POST['titre'],$_POST['imageOptionnelle']);
}
    
 

  header('Location: /profil.php');