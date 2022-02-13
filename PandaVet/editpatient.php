<?php
include("server.php");
error_reporting(E_ALL);
include("datapresentation.php");
$ownerid = $_GET['ownerid'];
$patientid = $_GET['patientid'];
$newObj = new Pet();
$Patient = $newObj -> getPet($patientid);

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to login first";
    header('location: index.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = null;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit pet</title>
</head>
<body>
<style>
        .body{
            background-color:#76b5c5
        }
        .edit-form{
            max-width: 350px;
            margin: 2rem auto;
            border: 2px solid;
            padding: 2rem;
            label{
                display: block;
                width:100%;
            }
            input{
                display: block;
                width: 100%;
            }
        }
        #button{
            
        }
    </style>
    <form class="edit-form" action="server.php" method="post">
        <div>
            <input type="hidden" name="ownerid" value="<?=$ownerid?>">
            <input type="hidden" name="patientid" value="<?=$patientid?>">
            <input type="hidden" name="or_petname" value="<?=$Patient['petname']?>">
            <input type="hidden" name="or_species" value="<?=$Patient['species']?>">
            <input type="hidden" name="or_breed" value="<?=$Patient['breed']?>">
            <input type="hidden" name="or_birthday" value="<?=$Patient['birthday']?>">
        </div>
        <div>
            <legend>Name:</legend>
            <input type="text" name="petname" id="petname" placeholder="<?=$Patient['petname']?>">
        </div>
        <div>
             <legend>Species:</legend>
             <input type="text" name="species" id="species" placeholder="<?=$Patient['species']?>">
        </div>
        <div>
            <legend>Breed:</legend>
            <input type="text" name="breed" id="breed" placeholder="<?=$Patient['breed']?>">
        </div>
        <div>
            <legend>Birthday:</legend>
            <input type="datetime" name="birthday" id="birthday" placeholder="<?=$Patient['birthday']?>">
        </div>
        <div>
            <button type="submit" name="editpatient">Save changes</button>
        </div>
    </form>
</body>
</html>