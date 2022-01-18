<?php
include("validation.php");

if (!isset($_SESSION["username"])) {
    atiranyit("index");
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['admin']);
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korábbi rendelések</title>
</head>

<body>
    <h1>Mozi neve </h1>
    (menü)

    <?php if (!isset($_SESSION["username"])) : ?>
        <a href="login.php"><button> Bejelentkezés</button></a>
    <?php endif ?>
    <?php if (isset($_SESSION["username"])) : ?>
        <a href="earlyer.php"><button> Korábbi rendelések</button></a>
        <?php if ($_SESSION["isAdmin"]) : ?>
            <a href="newfilm.php"><button>Új vetités felvitele(ha admin)</button></a>
        <?php endif ?>
        <a href="index.php?logout='1'"> <button>Kijelentkezés</button></a>

    <?php endif ?>

    <ul>
        <li>Lista <button>Lemondás</button></li>
    </ul>
    Lemondó gomb ha vetités előtt egy nappal járunk
    Js jóváhagyó ablakkal megy a kérés a szerver felé
</body>

</html>