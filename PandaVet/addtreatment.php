<?php
include("server.php");
error_reporting(E_ALL);
include("datapresentation.php");
$ownerid = $_GET["ownerid"];
$patientid = $_GET["patientid"];

$newObj = new Pet();
$patient = $newObj -> getPet($patientid);

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
    <title>Add treatment</title>
</head>
<body>
<style>
        .body{
            background-color:#76b5c5
        }
        .add-form{
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
    <?=$patient['petname']?>
    <?=$patient['species']?>
    <?=$patient['breed']?>
    <?=$patient['birthday']?>
  
    <form class="add-form" action="server.php" method="post">
        <div>
            <input type="hidden" name="ownerid" value="<?=$ownerid?>">
            <input type="hidden" name="patientid"  value="<?=$patientid?>">
        </div>
        <div>
             <legend>Diagnostic:</legend>
            <input type="text" name="diagnostic" id="diagnostic">
        </div>
        <div>
             <legend>Treatment:</legend>
            <input type="text" name="treatment" id="treatment">
        </div>
        <div>
             <legend>Medicines:</legend>
            <input type="text" name="medicines" id="medicines">
        </div>
        <button type="submit" name="addtreatment">Save treatment</button>
    </form>
</body>
</html>