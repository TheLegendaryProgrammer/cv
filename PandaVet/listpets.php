<?php
include("server.php");
error_reporting(E_ALL);
include("datapresentation.php");
$id = $_GET["id"];

$newObj = new AllPet();
$allPets = $newObj ->getAllPetOfTheOwner($id);

if($allPets == null){
    header("location: addpatient.php?id=$id");
}

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
    <title>Patient list</title>
</head>
<body>
<style>
    .content-table{
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px  rgba(0,0,0,0.15);
    }
    .content-table thead tr {
        background-color:#009879;
        color: white;
        text-align: left;
    }
    .content-table th,

    .content-table td {
        padding: 1px 1px;
    }

    .content-table tbody tr{
        border-bottom: 1px solid #dddddd;
    }
    .content-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    .content-table tbody tr:last-of-type{
        border-bottom: 2px solid #009879;
    } 
    .content-table tbody tr.active-row{
        font-weight: bold;
        color: #009879;

    }
</style>


    <a href="listowners.php"><button>List owners</button></a>
    <a href="listpets.php?logout='1'"><button>Logout</button></a>
    

    <table class = "content-table" >
        <thead>
            <tr>
                <th>Name</th>
                <th>Species</th>
                <th>Breed</th>
                <th>Birthday</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allPets as $key => $allPets) : ?>
            <tr>   
            <td> <?php echo $allPets['petname'] ?> </td>
            <td> <?php echo $allPets['species'] ?> </td>
            <td> <?php echo $allPets['breed'] ?> </td>
            <td> <?php echo $allPets['birthday'] ?> </td>
            <td> <a href="addtreatment.php?patientid=<?= $allPets['patientid']?>&ownerid=<?= $id?>"><button>Add treatment </button></a></td>
            <td> <a href="editpatient.php?patientid=<?= $allPets['patientid']?>&ownerid=<?= $id?>"><button>Edit patient</button></a></td>
            </tr>
            
            <?php endforeach ?>
        </tbody>
       
    </table>

    <a href="addpatient.php?id=<?=$id?>"><button>New patient</button></a>
</body>
</html>