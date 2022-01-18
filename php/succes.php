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
foreach ($users as $user) {
    if ($user->nev == $_SESSION["username"]) {

        $userId = $user->id;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sikeres vásárlás</title>
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

    <table>
        <tr>
            <td><img width="100%" src="<?= $screenings[$movieId - 1]->posterurl ?>" alt="<?= $screenings[$movieId - 1]->title ?> posztere"></td>
            <td>
                <h3>
                    <?= $screenings[$movieId - 1]->title ?><br>
                </h3>
                Terem: <?= $screenings[$movieId - 1]->hall ?> <br>
                Időpont: <?= $screenings[$movieId - 1]->time ?> <br>
                Ár: <?= $screenings[$movieId - 1]->price ?> <br>
                Leírás: <br> <?= $screenings[$movieId - 1]->description ?> <br>

                <a href="<?= $screenings[$movieId - 1]->porturl ?>"><?= $screenings[$movieId - 1]->porturl ?></a>
            </td>

        </tr>
        <tr>
            <td>
                Jegyek száma: <?= $ticketnumber ?>
            </td>
            <td>
                Fizetendő összeg: <?= $ticketnumber *  $screenings[$movieId - 1]->price ?>
            </td>
        </tr>
    </table>

    <form action="" method="post" novalidate>
        <input type="hidden" name="succesfullMovieID" value="<?= $movieId ?>">
        <input type="hidden" name="succesfullUserId" value="<?= $userId ?>">
        <input type="hidden" name="succesfullTicketNumber" value="<?= $ticketnumber ?>">
        <button type="submit" name="confirm">Elfogad</button> <button formaction="index.php">Vissza a főoldalra</button>
    </form>


</body>

</html>