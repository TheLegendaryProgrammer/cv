<?php  include('server.php');
include('datapresentation.php');

$newObj = new AllUser();
$AllUser = $newObj -> getAllUser();
$newObj = new CountOwnersPatients();
$OwnerPatient = $newObj -> countOwnersPatients();
$newObj = new CountPatientsTreatments();
$PatientTreatment = $newObj -> countPatientsTreatments();
$newObj = new AllPatientWithDietTreatment();
$PatientWithDiet = $newObj -> getAllPatientWithDietTreatment();
$newObj = new OwnersWhosHaveDogAndCat();
$OwnersWithDogOrCat = $newObj -> getOwnersWhosHaveDogAndCat();


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
    <title>Admin</title>
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
    .content-table .sub-table{
        color:#1b5e08;
    }
</style>

    <a href="listowners.php"><button>List owners</button></a>   
    <table class="content-table">
        <thead>

            <tr>
                <th> Username  </th>
                <th> Email </th>
                <th> Phone Number </th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($AllUser as $key => $AllUser) : ?>
            <tr>
                <td><?=$AllUser['username']?></td>
                <td><?=$AllUser['email']?></td>
                <td><?=$AllUser['phonenumber']?></td>
            </tr>
                <?php endforeach ?>
        </tbody>
    </table>
    
        <a href="registration.php">
            <button>Add new user</button>
        </a>

        <h2>Statisztikák</h2>
        <h3>Egyes betegeknek hány állatuk van</h3>
        <table class="content-table">
            <thead>

                <tr>
                    <th>Name</th>
                    <th>Number of pets</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($OwnerPatient as $key => $OwnerPatient) : ?>
                    <tr>
                        <td><?=$OwnerPatient['ownername']?></td>
                        <td><?=$OwnerPatient['count']?></td>
                    </tr>
                    <?php endforeach ?>
            </tbody>

        </table>

        <h3>Egyes állatoknak hány kezelésük van</h3>
        <table class="content-table">
            <thead>

                <tr>
                    <th>Name</th>
                    <th>Treatments</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($PatientTreatment as $key => $PatientTreatment) : ?>
                    <tr>
                        <td><?=$PatientTreatment['petname']?></td>
                        <td><?=$PatientTreatment['count']?></td>
                    </tr>
                    <?php endforeach ?>
            </tbody>

        </table>

        <h3>Állatok akiknek diétázniuk kell</h3>
        <table class="content-table">
            <thead>

                <tr>
                    <th>Name</th>
                    <th>Treatments</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($PatientWithDiet as $key => $PatientWithDiet) : ?>
                    <tr>
                        <td><?=$PatientWithDiet['petname']?></td>
                        <td><?=$PatientWithDiet['treatment']?></td>
                    </tr>
                    <?php endforeach ?>
            </tbody>

        </table>

        <h3>Azok akiknek vagy kutyájuk vagy macskájuk van</h3>
        <table class="content-table">
            <thead>

                <tr>
                    <th>Name</th>
                    <th>Treatments</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($OwnersWithDogOrCat as $key => $OwnersWithDogOrCat) : ?>
                    <tr>
                        <td><?=$OwnersWithDogOrCat['ownername']?></td>
                       
                    </tr>
                    <?php endforeach ?>
            </tbody>

        </table>
</body>
</html>