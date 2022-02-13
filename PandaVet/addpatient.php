<?php  include('server.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to login first";
    header('location: index.php');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$id = $_GET["id"];

?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add patient</title>
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
    <form class="add-form"action="server.php" method="post">
        <div>
          <input type="hidden" name="ownerid" id="ownerid" value="<?=$id?>">
        </div>
        <div>
            <legend>Pet name:</legend>
            <input type="text" name="petname" id="petname">
        </div>
        <div>
            <legend>Species:</legend>
            <input type="text" name="species" id="species">
        </div>
        <div>
            <legend>Breed:</legend>
            <input type="text" name="breed" id="breed">
        </div>
        <div>
            <legend>Birthday:</legend>
            <input type="datetime" name="birthday" id="birthday">
        </div>
      <br>
      <button type="submit" name="addpatient">Add patient</button>
    </form>
</body>
</html>