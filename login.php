<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php";
?>

<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Se Connecter";
include_once $_SERVER['DOCUMENT_ROOT'] . "/components/head.php";
?>

<body>
    <h1>Se Connecter</h1>


    <section>
        <h2>S'inscrire</h2>
        <form action="/routes/signup.php" method="POST">
            <input type="email" name="email" placeholder="harry.potter@poudlard.com">
            <input type="text" name="username" placeholder="Nom d'utilisateur">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="password" name="passwordConfirm" placeholder="Confirmer le mot de passe">
            <button>Valider</button>
        </form>
    </section>

    <section>
        <h2>Connexion</h2>
        <form action="/routes/signin.php" method="POST">
            <input type="email" name="email" placeholder="harry.potter@poudlard.com">
            <input type="password" name="password" placeholder="Votre mot de passe">
            <button>Valider</button>
        </form>
    </section>

</body>

</html>