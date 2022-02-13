<?php  include('server.php');
if(isset($_SESSION['username'])){
    header("location:listowners.php");
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
    <title>Index</title>
</head>
<body>
    <style>
        .body{
            background-color:#76b5c5
        }
        .login-form{
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
<h1>
    PANDA VET
</h1>
    <form class="login-form" action="server.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="User name">
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Password">
        
        <br>
        <button class="button" type="submit"  name="loginuser">Login</button>
    </form>

    Minta adatok
    <br>
   felhasználónév: DrMikelaAron <br>
   Jelszó: password
   <br>
------------------- <br>
   Admin: Admin <br>

   Jelszó: admin <br>
              
            
</body>
</html>