<?php
////////////////////Json fajlkezelés ////////////////
/**
 * json fajlbol csinál tombot
 * @param String $filenev annak a .json filenak a neve amit be szeretnénk olvasni
 */
function jsonBeolvas($filenev)
{
    return json_decode(file_get_contents($filenev));
}

/**
 * Json fajlba kiirás
 * @param String $filenev annak a json filenak a neve amibe irni szeretnénk
 * @param $adat az a tomb vagy objektum amit bele szeretnénk irni a fajlba
 */
function jsonKiir($filenev, $adat)
{
    file_put_contents($filenev, json_encode($adat, JSON_PRETTY_PRINT));
}

////////////////////Autentikáció ///////////////////////////

/**
 * felhasználó azonositására használt függvény
 * 
 * @param String $fnev felhasználónév amit elkérünk
 * @param String $pw a jelszó amit elkérünk
 */
function felhasznaloHelyes($fnev, $pw)
{
    $tomb = jsonBeolvas("felhasznalok.json");

    $volt = false;
    $index = 0;
    while ($index < count($tomb) && !$volt) {
        $volt = $tomb[$index]->fnev == $fnev;
        $index++;
    }

    if ($volt) {
        $volt =  $tomb[$index - 1]->pw == $pw;
    }
    return $volt;
}

///////////////////// Egyéb //////////////////////////////
/**
 * Átirányitja a felhasználót egy megadott oldalra
 * @param String $oldal az oldal neve .php nélkül 
 */
function atiranyit($oldal)
{
    header('Location: ' . $oldal . '.php');
    die;
}


/**
 * Ellenőrzi, hogy a GET requestben létezik-e egy adott kulcsú adat, és nem csak üres karakterekből áll
 * @param String $string a kulcs amit ellenőrizni szeretnél
 */
function letezikGet($string)
{
    return  isset($_GET[$string]) && strlen(trim($_GET[$string])) != 0;
}

/**
 * Ellenőrzi, hogy a POST requestben létezik-e egy adott kulcsú adat, és nem csak üres karakterekből áll
 * @param String $string a kulcs amit ellenőrizni szeretnél
 */
function letezikPost($string)
{
    return  isset($_POST[$string]) && strlen(trim($_POST[$string])) != 0;
}


/**
 * Ha történt hiba az adatfeldolgozás során, de az adott kulcsú adat helyes visszaasdja az adatot.
 * @param Array $eredmeny a feldolgozott adatok
 * @param String $string a kulcs amit ellenőrizni szeretnél
 * @param String[] $hibak a talált hibák tombje
 */
function perzisztencia($eredmeny, $string, $hibak)
{
    if (count($hibak) === 0) {
        return;
    }

    if (!isset($eredmeny[$string])) {
        return;
    }
    return $eredmeny[$string];
}

/**
 * Megnézzük, hogy egy adott asszociativ tombben szerepel-e, az általunk keresett adat!
 * @param String $adat a keresett adatunk
 * @param Array $tomb a tomb amiben keressuk
 * @param param $kulcs a tombelemekhez tartozó kulcsszó, vagy valami
 */
function voltE($adat, $tomb, $kulcs)
{
    foreach ($tomb as $elem) {
        if ($elem->$kulcs === $adat) {
            return true;
        }
    }
    return false;
}

function regisztral($fnev, $pw)
{
    $tomb = jsonBeolvas("users.json");
    $tomb[] = (object)[
        "fnev" => $fnev,
        "pw" => password_hash($pw, PASSWORD_DEFAULT)
    ];
    jsonKiir("users.json", $tomb);
}

function felhasznaloLetezik($fnev)
{
    $tomb = jsonBeolvas("users.json");

    $volt = false;
    for ($index = 0; $index < count($tomb) && !$volt; $index++) {
        $volt = $tomb[$index]->fnev == $fnev;
    }

    return $volt;
}
