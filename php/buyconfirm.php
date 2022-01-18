<?php
include("validation.php");

//bővitendő
if (isset($_SESSION["username"])) {
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
    <title>Vásárlás jóváhagyása</title>
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

    <form action="" method="post">
        Adatok újra(ticket buy)
        Összesített jegyár
        <input type="submit" value="Jóváhagyás">
    </form>

</body>

</html>