<?php
include("server.php");
error_reporting(E_ALL);
include("datapresentation.php");
$newObj = new AllOwner();
$allOwner = $newObj ->getAllOwner();

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
    <title>List</title>
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

       

        <a href="listowners.php?logout='1'"><button>Logout</button></a>
       
  
        <div>
            <input type="text" name="ownername" id="ownernamesearch" onkeyup="searchFunction()" placeholder="Find owner">
        </div>
        <br>


    <table class="content-table"> 
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Address</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($allOwner as $key => $allOwner) : ?>
            <tr class="ownerrow">
                <td class="ownername"> <?php echo $allOwner['ownername'] ?></td>
                <td> <?php echo $allOwner['owneremail'] ?></td>
                <td> <?php echo $allOwner['ownerphonenumber'] ?></td>
                <td> <?php echo $allOwner['address'] ?></td>
                <td>
                    <a href="addpatient.php?id=<?= $allOwner['ownerid'] ?>"><button>Add patient</button></a>
                </td>
                <td>
                    <a href="editowner.php?id=<?= $allOwner['ownerid'] ?>"><button>Edit owner</button></a>
                </td>
                <td>
                    <a href="listpets.php?id=<?= $allOwner['ownerid'] ?>"><button>List pets</button></a>
                </td>
                <td>
                    <a href="listtreatments.php?ownerid=<?= $allOwner['ownerid'] ?>"><button>List treatments</button></a>
                </td>
            </tr>
    
                <?php endforeach ?>

        </tbody>
       
        </table>
        <a href="addowner.php"><button>Add owner</button></a>
</body>
<script>
    function searchFunction() {
    var ownerrow = document.getElementsByClassName("ownerrow");
    var input = document.getElementById("ownernamesearch");
    console.log(input.value);
    var filter = input.value.toUpperCase();
    var ownername = document.getElementsByClassName("ownername");
    for (i = 0; i < ownerrow.length; i++) {
      for (i = 0; i < ownername.length; i++) {
       var name = ownername[i];
        txtValue = name.textContent || name.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            ownerrow[i].style.display = "";
        } else {
            ownerrow[i].style.display = "none";
        }
    }
    }
}
</script>
</html>