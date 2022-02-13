<?php  include('server.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to login first";
    header('location: index.php');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Add owner</title>
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
    <form class="add-form" action="server.php" method="post">
        <div>
            <legend>Owner name:</legend>
            <input type="text" name="ownername" id="ownername">
        </div>
        <div>
            <legend>Owner email:</legend>
            <input type="email" name="owneremail" id="owneremail">
        </div>
        <div>
            <legend>Owner phonenumber:</legend>
            <input type="text" name="ownerphonenumber" id="ownerphonenumber">
        </div>
        <div>
            <legend>Owner address:</legend>
            <input type="text" name="address" id="address">
        </div>
        <div>
            <button type="submit" name="addowner">Add owner</button>
        </div>
    </form>
</body>
</html>