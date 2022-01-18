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
    <title>Regisztráció </title>
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
    <br>

    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>



    <form action="registration.php" method="post" novalidate>
        Felhasználónév <input type="text" name="nev" id="nev"> <br>
        Telefonszám <input type="number" name="phone" id="phone"><br>
        Email <input type="text" name="email" id="email"><br>
        Jelszó <input type="password" name="pw1" id="pw1"><br>
        Jelszó megerősítése <input type="password" name="pw2" id="pw2"><br>
        <input type="submit" value="Regisztráció" name="registrate">
    </form>

</body>

</html>