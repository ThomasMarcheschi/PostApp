<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UserController.php";

if (!(isset($_POST['email'], $_POST['password']))) {
    header("Location: /login.php");
    die();
}

$user = new UserController($_POST['email'], $_POST['password'],"");

if (!($user->isDataValid())) {
    header("Location: /login.php?connexion=error&" . $user->getErrors());
    die();
}

$user1=UserController::dataProfil($_POST['email']);

if (!$user->exist()) {
    header("Location: /login.php?connexion=error&emailError=EmailDosntExist");
    die();
}


if (!$user->isPasswordCorrect()) {
    header("Location: /login.php?connexion=error&passwordError=PasswordIncorrect");
    die();
}


$_SESSION["email"] = $user1['email'];
$_SESSION["id"] = $user1['id'];
$_SESSION["username"] = $user1['username'];
$_SESSION["avatar"] = $user1['avatar'];
$_SESSION["imageCouverture"] = $user1['imageCouverture'];

header("Location: /profil.php");
