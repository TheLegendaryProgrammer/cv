<?php
include("validation.php");

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['admin']);
    header("location: index.php");
}

$filmek = jsonBeolvas("screenings.json");
$termek = jsonBeolvas("halls.json");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mozioldal</title>
</head>

<style>
    h1 {
        text-align: center;
        background-image: url("https://upload.wikimedia.org/wikipedia/en/7/7c/Event_Cinemas_Logo.png");
        background-color: #cccccc;

    }

    table {
        margin-left: auto;
        margin-right: auto;
    }

    table,
    tr,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        text-align: center;
    }
</style>

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
            <th>Filmek</th>
            <th>Időpont</th>
            <th>Terem</th>
            <th>Nyelv</th>
            <th>Szabad Helyek</th>
        </tr>
        <?php foreach ($filmek as $film) : ?>

            <tr <?php if ($film->avaible != true) : ?> style="background-color: grey;" <?php endif ?>>
                <td><?= $film->title ?></td>
                <td><?= $film->time ?></td>
                <td><?= $film->hall ?></td>
                <td><?= $film->leanguage ?></td>
                <td><?= $film->spaces ?>/150</td>
                <?php if (isset($_SESSION["username"]) && $film->spaces > 0 && $film->avaible == true) : ?>
                    <td> <a href="ticketbuy.php?id=<?= $film->id ?>"><button>Jegyvásárlás</button></a>
                    </td>
                    <?php if ($_SESSION["isAdmin"]) : ?>
                        <td>

                            <a href="edit.php?id=<?= $film->id ?>"> <button>Módositás</button></a>
                        </td>
                    <?php endif ?>
                <?php endif ?>
            </tr>

        <?php endforeach ?>
    </table>
    <br>

    <button>Előző hét</button>
    <button>Következő hét</button>


</body>

</html>