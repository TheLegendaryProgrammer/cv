<?php
session_start();
include("fuggvenyek.php");

$users = jsonBeolvas("users.json");
$screenings = jsonBeolvas("screenings.json");
$halls = jsonBeolvas("halls.json");
$tickets = jsonBeolvas("tickets.json");


$nev = "";
$email = "";
$password = "";
$phone = "";
$admin = false;

$title = "";
$time = "";
$porturl = "";
$posterurl = "";
$description = "";
$leanguage = "";
$hall = "";
$spaces = "";
$price = "";
$avaible = "";

$pw1 = "";
$pw2 = "";

$errors = [];


if (isset($_POST["registrate"])) {
    $nev = $_POST["nev"];
    $email = $_POST["email"];
    $pw1 = $_POST["pw1"];
    $pw2 = $_POST["pw2"];
    $phone = $_POST["phone"];

    $phoneLenght = strlen($phone);

    if (!letezikPost("nev")) {
        $errors[] = "Nem adott meg szöveget!";
    } else if (voltE($nev, $users, "nev")) {
        $errors[] = "Már létezik ez a felhasználónév!";
    }

    if (!letezikPost("phone")) {
        $errors[] = "Nem adott meg telefonszámot!";
    } else if (intval($_POST["phone"]) != floatval($_POST["phone"])) {
        $errors[] = "Nem egész számot adtál meg!";
    } else if ($phoneLenght != 9) {
        $errors[] = "Nem 9 számjegyű a telefonszám";
    } else if (voltE($phone, $users, "phone")) {
        $errors[] = "Már létezik ez a telefonszám!";
    }

    if (!letezikPost("email")) {
        $errors[] = "Nem adott meg emailCimet!";
    } else if (voltE($email, $users, "email")) {
        $errors[] = "Már létező emailcím";
    }

    if (!letezikPost("pw1")) {
        $errors[] = "Nem adott meg jelszót!";
    }

    if (!letezikPost("pw2")) {
        $errors[] = "Nem adott meg jelszómegerősitőt!";
    }

    if ($pw1 != $pw2) {
        $errors[] = "A megadott jelszavak nem egyeznek";
    }

    ////  ittt tartasz te fasz
    if (count($errors) === 0) {
        $password = password_hash($pw1, PASSWORD_DEFAULT);
        $users[] = (object)[
            "id" => count($users) + 1,
            "nev" => $nev,
            "email" => $email,
            "password" => $password,
            "phone" => $phone,
            "admin" => $admin
        ];
        jsonKiir("users.json", $users);
        atiranyit("login");
    }
}


if (isset($_POST["login"])) {
    $nev = $_POST["nev"];
    $password = $_POST["password"];
    $ghostpw = "";
    $isAdmin = false;

    if (!letezikPost("nev")) {
        $errors[] = "Nem adtál meg felhasználó nevet!";
    } else if (!voltE($nev, $users, "nev")) {
        $errors[] = "Nincs ilyen felhasználónév!";
    }

    foreach ($users as  $user) {
        if ($user->nev == $nev) {
            $ghostpw = $user->password;
            $isAdmin = $user->admin;
        }
    }


    if (!letezikPost("password")) {
        $errors[] = "Nem lehet üres a jelszó mező!";
    } else if (!password_verify($password, $ghostpw)) {
        $errors[] = "Nem jó a jelszó!";
    }

    if (count($errors) === 0) {
        $_SESSION["username"] = $nev;
        $_SESSION["isAdmin"] = $isAdmin;
        atiranyit("index");
    }
}

if (isset($_POST["newfilm"])) {

    $title = $_POST["title"];
    $time = $_POST["time"];
    $porturl = $_POST["porturl"];
    $posterurl = $_POST["posterurl"];
    $description = $_POST["description"];
    $leanguage = $_POST["leanguage"];
    $hall = $_POST["halls"];
    $spaces = intval($_POST["tickets"]);
    $price = intval($_POST["price"]);
    $avaible = true;

    // 
    $hallspaces = 0;
    foreach ($halls as $terem) {
        if ($terem->nev == $hall) {
            $hallspaces = $terem->helyek;
        }
    }


    if (!letezikPost("title")) {
        $errors[] = "A cím mező nem lehet üres";
    }

    if (!letezikPost("description")) {
        $errors[] = "A leírás mező nem lehet üres";
    }

    if (!letezikPost("porturl")) {
        $errors[] = "A port link mező nem lehet üres";
    }

    if (!letezikPost("posterurl")) {
        $errors[] = "A poszter mező nem lehet üres";
    }

    if (!letezikPost("title")) {
        $errors[] = "A cím mező nem lehet üres";
    }

    if (!letezikPost("tickets")) {
        $errors[] = "A jegyek mező nem lehet üres";
    } else if (!is_numeric($_POST["tickets"])) {
        $errors[] = "Nem számot adott meg egész számnak!";
    } else if (intval($_POST["tickets"]) != floatval($_POST["tickets"])) {
        $errors[] = "Nem egész számot adtál meg egész számnak";
    } else if ($spaces < 0) {
        $errors[] = "Helyek száma nem lehet negatív!";
    } else if ($spaces > $hallspaces) {
        $errors[] = "Nem lehet több jegyet eladni mint ahány hely van a teremben";
    }

    if (!letezikPost("price")) {
        $errors[] = "A ár mező nem lehet üres";
    } else if (!is_numeric($_POST["price"])) {
        $errors[] = "Nem számot adott meg egész számnak!";
    } else if (intval($_POST["price"]) != floatval($_POST["price"])) {
        $errors[] = "Nem egész számot adtál meg egész számnak";
    } else if ($price < 500) {
        $errors[] = "Minimum ár 500!";
    }

    if (!letezikPost("time")) {
        $errors[] = "A idő mező nem lehet üres";
    }

    if (count($errors) === 0) {
        $screenings[] = (object)[
            "id" => count($screenings) + 1,
            "title" => $title,
            "time" => $time,
            "porturl" => $porturl,
            "posterurl" => $posterurl,
            "description" => $description,
            "leanguage" => $leanguage,
            "hall" => $hall,
            "spaces" => $spaces,
            "price" => $price,
            "avaible" => $avaible,
        ];
        jsonKiir("screenings.json", $screenings);
        atiranyit("index");
    }
}

if (isset($_POST["ticketbuy"])) {
    $movieId = $_POST["movieidsucces"];
    $ticketnumber = $_POST["ticketnumber"];
}

if (isset($_POST["confirm"])) {
    $finalMovieId = intval($_POST["succesfullMovieID"]);
    $finalUserId = intval($_POST["succesfullUserId"]);
    $finalTicketNumber = intval($_POST["succesfullTicketNumber"]);

    $screenings[$finalMovieId - 1] = (object)[
        "id" => $screenings[$finalMovieId - 1]->id,
        "title" => $screenings[$finalMovieId - 1]->title,
        "time" => $screenings[$finalMovieId - 1]->time,
        "porturl" => $screenings[$finalMovieId - 1]->porturl,
        "posterurl" => $screenings[$finalMovieId - 1]->posterurl,
        "description" => $screenings[$finalMovieId - 1]->description,
        "leanguage" => $screenings[$finalMovieId - 1]->leanguage,
        "hall" => $screenings[$finalMovieId - 1]->hall,
        "spaces" =>  $screenings[$finalMovieId - 1]->spaces - $finalTicketNumber,
        "price" => $screenings[$finalMovieId - 1]->price,
        "avaible" => $screenings[$finalMovieId - 1]->avaible
    ];

    $tickets[] = (object)[
        "userId" => $finalUserId,
        "movieId" => $finalMovieId,
        "quantity" => $finalTicketNumber
    ];
    jsonKiir("screenings.json", $screenings);
    jsonKiir("tickets.json", $tickets);
    atiranyit("index");
}
