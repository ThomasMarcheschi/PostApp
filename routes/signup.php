<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UserController.php";

if(isset($_POST['email'],$_POST['password'],$_POST['username'])){

    $user = new UserController($_POST['email'],$_POST['password'],$_POST['username']);

if($user -> isDataValid() && $_POST['password'] === $_POST['passwordConfirm']){
    if($user -> exist()){
        header('Location: /login?inscription=error&emailErrorExist');
        die();
    }

$user -> signupUser();
header('Location: /login.php');
}else{
    $returnData = $user -> getErrors();
    header('Location: /login?inscription=error&' . $returnData);
}


    
    

}else{
    header('Location: /login.php');
}