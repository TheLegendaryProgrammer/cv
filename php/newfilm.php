<?php
include("validation.php");

if (!isset($_SESSION["username"]) && !$_SESSION["isAdmin"]) {
    atiranyit("index");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['admin']);
    header("location: index.php");
}
$termek = jsonBeolvas("halls.json");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új vetités felvétele</title>
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

    <form action="newfilm.php" method="post" novalidate>
        Cím: <input type="text" name="title" id="title"><br>
        Rövid leírás: <textarea name="description" id="description" cols="30" rows="10"></textarea><br>
        URL: <input type="text" name="porturl" id="porturl"><br>
        PosterUrl: <input type="text" name="posterurl" id="posterurl"><br>
        Időpont: <input type="datetime" name="time" id="time"><br>
        Nyelv: <input type="text" name="leanguage" id="leanguage"><br>
        Terem: <select name="halls" id="halls">
            <?php foreach ($termek as $terem) : ?>
                <option value="<?= $terem->nev ?>"><?= $terem->nev ?></option>
            <?php endforeach ?>
        </select><br>
        Jegyek száma <input type="number" name="tickets" id="tickets"><br>
        Jegyár <input type="number" name="price" id="price"><br>
        <input type="submit" value="Mentés" name="newfilm">
    </form>


</body>

</html>