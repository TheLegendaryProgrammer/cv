<?php  include('server.php');

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to login first";
    header('location: index.php');
}
if($_SESSION['username'] != 'Admin'){
    $_SESSION['msg'] = "You are not admin";
    header('location: listowners.php');
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
    <title>Registration</title>
</head>
<body>
    <form action="server.php" method="post">
        <div>
            <legend>Username:</legend>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <legend>Email:</legend>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <legend>Phonenumber:</legend>
            <input type="text" name="phonenumber" id="phonenumber">
        </div>
        <div>
            <legend>Password:</legend>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <legend>Password again:</legend>
            <input type="password" name="passwordagain" id="passwordagain">
        </div>
        <button type="submit" name="registrateuser">Registrate</button>
    </form>
</body>
</html>