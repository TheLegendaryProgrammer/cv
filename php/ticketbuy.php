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
$id = $_GET["id"];
$usersTickets = [];

foreach ($tickets as $ticket) {
    if ($ticket->movieId == $id) {
        $usersTickets[] = $users[$ticket->userId - 1];
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jegyvásárlás</title>
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




    <table>
        <tr>
            <td><img width="100%" src="<?= $screenings[$id - 1]->posterurl ?>" alt="<?= $screenings[$id - 1]->title ?> posztere"></td>
            <td>
                <h3>
                    <?= $screenings[$id - 1]->title ?><br>
                </h3>
                Terem: <?= $screenings[$id - 1]->hall ?> <br>
                Időpont: <?= $screenings[$id - 1]->time ?> <br>
                Ár: <?= $screenings[$id - 1]->price ?> <br>
                Leírás: <br> <?= $screenings[$id - 1]->description ?> <br>

                <a href="<?= $screenings[$id - 1]->porturl ?>"><?= $screenings[$id - 1]->porturl ?></a>
            </td>

        </tr>
        <tr>
            <td></td>
            <td>
                <form action="succes.php" method="post" novalidate>
                    <input type="hidden" value=<?= $id ?> name="movieidsucces">
                    <input placeholder="jegyek száma" type="number" name="ticketnumber" id="" min="1" max="<?= $screenings[$id - 1]->spaces ?>">
                    <input type="submit" value="Vásárlás" name="ticketbuy">
                </form>
            </td>
        </tr>
    </table>


    <?php if ($_SESSION["isAdmin"]) : ?>
        <ul>

            <?php foreach ($usersTickets as $userticket) : ?>

                <li><?= $userticket->nev ?> -> <?= $userticket->email ?> </li>
            <?php endforeach ?>

        </ul>
    <?php endif ?>

</body>

</html>