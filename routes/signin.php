<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UserController.php";

if (!(isset($_POST['email'], $_POST['password']))) {
    header("Location: /login.php");
    die();
}

$user = new UserController($_POST['email'], $_POST['password'], "");

if (!($user->isDataValid())) {
    header("Location: /login.php?connexion=error&" . $user->getErrors());
    die();
}


if (!$user->exist()) {
    header("Location: /login.php?connexion=error&emailError=EmailDosntExist");
    die();
}


if (!$user->isPasswordCorrect()) {
    header("Location: /login.php?connexion=error&passwordError=PasswordIncorrect");
    die();
}

$_SESSION["email"] = $user->getEmail();
$_SESSION["id"] = $user->getId();
$_SESSION["username"] = $user->getUsername();
$_SESSION["avatar"] = $user->getAvatar();
$_SESSION["imageCouverture"] = $user->getImageCouverture();

header("Location: /profil.php");
