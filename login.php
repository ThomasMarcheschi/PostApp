<?php
session_start();
$inscriptionEmailError = "";
$inscriptionPasswordError = "";
$inscriptionUsernameError = "";
$inscriptionPasswordConfirmError = "";

$connexionEmailError = "";
$connexionPasswordError = "";


if (isset($_GET['inscription'])) {
    if (isset($_GET['emailError'])) {
        $inscriptionEmailError = $_GET['emailError'] === "InputInvalid" ? "Email incorrecte" : "Email existe deja!";
    }

    if (isset($_GET['passwordError'])) {
        $inscriptionPasswordError = $_GET['passwordError'] === "InputInvalid" ? "Mot de passe trop court" : "";
    }

    if(isset($_GET['usernameError'])){
        $inscriptionUsernameError = $_GET['usernameError'] === "InputInvalid" ? "Nom d'utilisateur incorrecte" : "Nom d'utilisateur existe déja";
    }

    if(isset($_GET['passwordConfirmError'])){
        $inscriptionPasswordConfirmError = $_GET['passwordConfirmError'] === "InputInvalid" ? "Mot de passe erroné" : "";
    }
}

if (isset($_GET['connexion'])) {
    if (isset($_GET['emailError'])) {
        $connexionEmailError = $_GET['emailError'] === "InputInvalid" ? "Email incorrecte" : "Email n'existe pas!";
    }

    if (isset($_GET['passwordError'])) {
        $connexionPasswordError = $_GET['passwordError'] === "InputInvalid" ? "Mot de passe trop court" : "Mauvais mot de passe!";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Se Connecter";
include_once $_SERVER['DOCUMENT_ROOT'] . "/components/head.php";
?>

<body>
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php";
    ?>

    <h1>Se Connecter</h1>


    <section class="authentification">
        <h2>S'inscrire</h2>
        <form action="/routes/signup.php" method="POST">
            <input type="email" name="email" placeholder="harry.potter@poudlard.com">
            <p class="error">
                <?= $inscriptionEmailError ?>
            </p>
            <input type="text" name="username" placeholder="Nom d'utilisateur">
            <p class="error">
                <?= $inscriptionUsernameError ?>
            </p>
            <input type="password" name="password" placeholder="Mot de passe">
            <p class="error">
                <?= $inscriptionPasswordError ?>
            </p>
            <input type="password" name="passwordConfirm" placeholder="Confirmer le mot de passe">
            <p class="error">
                <?= $inscriptionPasswordConfirmError ?>
            </p>
            <button>Valider</button>
        </form>
    </section>

    <section class="authentification">
        <h2>Connexion</h2>
        <form action="/routes/signin.php" method="POST">
            <input type="email" name="email" placeholder="harry.potter@poudlard.com">
            <p class="error">
                <?= $connexionEmailError ?>
            </p>
            <input type="password" name="password" placeholder="Votre mot de passe">
            <p class="error">
                <?= $connexionPasswordError ?>
            </p>
            <button>Valider</button>
        </form>
    </section>

</body>

</html>