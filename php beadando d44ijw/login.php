<?php
include("validation.php");

if (isset($_SESSION["username"])) {
    atiranyit("index");
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>


    <form action="login.php" method="post">
        Felhasználónév <input type="text" name="nev" id="nev"> <br>
        Jelszó <input type="password" name="password" id="password"> <br>
        <input type="submit" value="Belépés" name="login">
        <button formaction="registration.php">Regisztráció</button>
    </form>
    <br>



</body>

</html>