<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] ."/controllers/UserController.php";
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
</body>

</html>