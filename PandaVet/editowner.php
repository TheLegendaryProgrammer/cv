<?php
include("server.php");
error_reporting(E_ALL);
include("datapresentation.php");
$ownerid = $_GET['id'];
$newObj = new Owner();
$Owner = $newObj -> getOwner($ownerid);

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
    <title>Edit owner</title>
</head>
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
<body>
    <form class="edit-form" action="server.php" method="post">
        <div>
            <input type="hidden" name="ownerid" value="<?=$ownerid?>">
            <input type="hidden" name="or_ownername" value="<?=$Owner['ownername']?>">
            <input type="hidden" name="or_ownerphonenumber" value="<?=$Owner['ownerphonenumber']?>">
            <input type="hidden" name="or_owneremail" value="<?=$Owner['owneremail']?>">
            <input type="hidden" name="or_address" value="<?=$Owner['address']?>">
        </div>
        <div>
            <legend>Name:</legend>
            <input type="text" name="ownername" id="ownername" placeholder="<?=$Owner['ownername']?>" >
        </div>
        <div>
            <legend>Phone number:</legend>
            <input type="text" name="ownerphonenumber" id="ownerphonenumber" placeholder="<?=$Owner['ownerphonenumber']?>">
        </div>
        <div>
            <legend>Email:</legend>
            <input type="email" name="owneremail" id="owneremail" placeholder="<?=$Owner['owneremail']?>">
        </div>
        <div>
            <legend>Address:</legend>
            <input type="text" name="address" id="address" placeholder="<?=$Owner['address']?>">
        </div>
        <button type="submit" name="editowner">Save changes</button>
    </form>
</body>
</html>