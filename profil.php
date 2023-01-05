<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UserController.php";
?>
<!DOCTYPE html>
<html lang="fr">
<?php
$title = "Page de profil";
include_once $_SERVER['DOCUMENT_ROOT'] . "/components/head.php";
?>

<body>
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php";
    ?>
    <h1>Page de profil</h1>



    <div class="info-profil">
        <img id="couverture" src='<?= "/images/users/" . $_SESSION['imageCouverture'] ?>' alt="imageCouverture">
        <img id="avatar" src='<?= "/images/users/" . $_SESSION['avatar'] ?>' alt="avatar">
        <p><?= $_SESSION['username'] ?></p>
    </div>

    <section>
        <p>Changer D'image de Couverture</p>
        <form action="/routes/uploadCouverture.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="imageCouverture" accept="image/png, image/jpeg" />
            <button type="submit">Enregistrer</button>
        </form>
        <p>Changer D'image de Profil</p>
        <form action="/routes/uploadAvatar.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="avatar" accept="image/png, image/jpeg" />
            <button type="submit">Enregistrer</button>
        </form>

    </section>

    <?php var_dump($_SESSION)?>


</body>

</html>