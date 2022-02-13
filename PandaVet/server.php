<?php 

session_start();

$username = "";
$errors = array();
$_SESSION['success'] = "";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


$db = pg_connect("host=localhost port=5432 dbname= d44ijw user=d44ijw password=d44ijw") or die('cant log in');

if (isset($_POST['registrateuser'])) {

    $username = pg_escape_string($_POST['username']);
    $email = pg_escape_string($_POST['email']);
    $phonenumber = pg_escape_string($_POST['phonenumber']);
    $password_1 = pg_escape_string($_POST['password']);
    $passwordagain = pg_escape_string($_POST['passwordagain']);
    

     // Nem lehetnek üresek a rublikák
    if(empty($username)){
        array_push($errors, "Username can't be empty!");
    }
    if(empty($email)){
        array_push($errors, "Email can't be empty!");
    }
    if(empty($phonenumber)){
        array_push($errors, "Phonenumber can't be empty!");
    }
    if(empty($password_1)){
        array_push($errors, "Password can't be empty!");
    }

    if($password_1 != $passwordagain){
        array_push($errors, "Passwords don't matches!");
    }

    //Ha nincs hiba, megnézzük h benne van e már az adatbázisban a felhasználónév és a jelszó
    if (count($errors) === 0) {
        $sql_u = "SELECT * FROM user_table WHERE username='$username'";
        $res_u = pg_query($db, $sql_u);
        $sql_e = "SELECT * FROM user_table WHERE username='$email'";
        $res_e = pg_query($db, $sql_e);
        $sql_p = "SELECT * FROM user_table WHERE username='$phonenumber'";
        $res_p = pg_query($db, $sql_p);
        if (pg_num_rows($res_u) > 0) {
        
            $name_error = "This username is alredy exist";
            echo '<script type="text/javascript">'; 
           echo 'alert("This username is alredy exist");'; 
           echo 'window.location.href = "registration.php";';
           echo '</script>';
        }else if (pg_num_rows($res_e) > 0) {
        
            $name_error = "This email is alredy exist!";
            echo '<script type="text/javascript">'; 
           echo 'alert("This email is alredy exist!");'; 
           echo 'window.location.href = "registration.php";';
           echo '</script>';
        }else  if (pg_num_rows($res_p) > 0) {
        
            $name_error = "This phonenumber is alredy exist";
            echo '<script type="text/javascript">'; 
           echo 'alert("This phonenumber is alredy exist");'; 
           echo 'window.location.href = "registration.php";';
           echo '</script>';
        }else{


           if (count($errors) === 0) {
                $password = md5($password_1);
                $query = "INSERT INTO user_table (username, email, phonenumber, password, isadmin) 
                              VALUES('$username', '$email','$phonenumber', '$password', 2)";
                pg_query($db, $query);

                $_SESSION['success'] = "Succesfully added!";
        
                header('location: listowners.php');
        }
     }
    }
}

if (isset($_POST['loginuser'])){
    $username = pg_escape_string($db, $_POST['username']);
    $password1 = pg_escape_string($db, $_POST['password']);

    if(empty($username)){
        array_push($errors, "Username can't be empty!");
    }
   
    
    if (count($errors) == 0){
        $password = md5($password1);
        $query = "SELECT * FROM user_table WHERE username='$username' AND password='$password'";

        $results =  pg_query($db, $query);
        $data = pg_fetch_all($results);
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                $id = $row['id'];
                $isadmin = $row['isadmin'];
            }
        }

        if (pg_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['isadmin'] = $isadmin == 1;
        $_SESSION['success'] = "Login successful!";

        header('location: listowners.php');
        }else{
            array_push($errors, "Wrong username or password");
        }
    }

}


if (isset($_POST['addowner'])){
    
    $ownername = pg_escape_string($_POST['ownername']);
    $owneremail = pg_escape_string($_POST['owneremail']);
    $ownerphonenumber = pg_escape_string($_POST['ownerphonenumber']);
    $address = pg_escape_string($_POST['address']);

    if (empty($ownername)) {
        array_push($errors, "Owner name can't be empty");
    }
    if (empty($owneremail)) {
        array_push($errors, "Email address can't be empty");
    }
    if (empty($ownerphonenumber)) {
        array_push($errors, "Phone number can't be empty");
    }
    if (empty($address)) {
        array_push($errors, "Address cant be empty");
    }

    if (count($errors) === 0) {

        $sql_e = "SELECT * FROM owner_table WHERE owneremail='$owneremail'";
        $res_e = pg_query($db, $sql_e);
        $sql_p = "SELECT * FROM owner_table WHERE ownerphonenumber='$ownerphonenumber'";
        $res_p = pg_query($db, $sql_p);
        if (pg_num_rows($res_e) > 0) {
        
            $name_error = "This email is alredy exist!";
            echo '<script type="text/javascript">'; 
           echo 'alert("This email is alredy exist!");'; 
           echo 'window.location.href = "addowner.php";';
           echo '</script>';
        }else  if (pg_num_rows($res_p) > 0) {
        
            $name_error = "This phonenumber is alredy exist";
            echo '<script type="text/javascript">'; 
           echo 'alert("This phonenumber is alredy exist");'; 
           echo 'window.location.href = "addowner.php";';
           echo '</script>';
        }else{
            if (count($errors) == 0){
                $query = "INSERT INTO owner_table (ownername, owneremail, ownerphonenumber,address) 
                VALUES('$ownername', '$owneremail','$ownerphonenumber', '$address')";
                pg_query($db, $query);
                
                $_SESSION['success'] = "Owner added!";
                header("location: listowners.php");
            }
         }

    }
}
if (isset($_POST['addpatient'])){
    
    $ownerid = intval(pg_escape_string($_POST['ownerid']));
    $petname = pg_escape_string($_POST['petname']);
    $species = pg_escape_string($_POST['species']);
    $breed = pg_escape_string($_POST['breed']);
    $birthday = pg_escape_string($_POST['birthday']);

    

    if (empty($petname)) {
        array_push($errors, "Pet name can't be empty");
    }
    if (empty($ownerid)) {
        array_push($errors, "Ownerid can't be empty");
    }
    if (empty($species)) {
        array_push($errors, "Species can't be empty");
    }
    if (empty($breed)) {
        array_push($errors, "Breed can't be empty");
    }
    if (empty($birthday)) {
        array_push($errors, "Birthday can't be empty");
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO patient_table (ownerid, petname, species, breed, birthday) 
        VALUES('$ownerid', '$petname','$species', '$breed', '$birthday')";
        pg_query($db, $query);

        $_SESSION['success'] = "Pet added!";

        header("location: listpets.php?id=$ownerid");
    }
}

if (isset($_POST['addtreatment'])){

    $ownerid = intval(pg_escape_string($_POST['ownerid']));
    $patientid = pg_escape_string($_POST['patientid']);
    $diagnostic = pg_escape_string($_POST['diagnostic']);
    $treatment = pg_escape_string($_POST['treatment']);
    $medicines = pg_escape_string($_POST['medicines']);
   

    if (empty($diagnostic)) {
        array_push($errors, "Diagnostic can't be empty");
    }
    
    if (count($errors) === 0) {
        $query = "INSERT INTO treatment_table (patientid, diagnostic, treatment, medicines) 
        VALUES('$patientid', '$diagnostic','$treatment', '$medicines')";
        pg_query($db, $query);

        $_SESSION['success'] = "Treatment added!";

        header("location: listpets.php?id=$ownerid");
    }
}


if (isset($_POST['editowner'])){
    $ownerid = pg_escape_string($_POST['ownerid']);
    $ownername = pg_escape_string($_POST['ownername']);
    $owneremail = pg_escape_string($_POST['owneremail']);
    $ownerphonenumber = pg_escape_string($_POST['ownerphonenumber']);
    $address = pg_escape_string($_POST['address']);

    $or_ownername = pg_escape_string($_POST['or_ownername']);
    $or_owneremail = pg_escape_string($_POST['or_owneremail']);
    $or_ownerphonenumber = pg_escape_string($_POST['or_ownerphonenumber']);
    $or_address = pg_escape_string($_POST['or_address']);

    $queryownern = empty($ownername) ? $or_ownername : $ownername;
    $queryownere = empty($owneremail) ? $or_owneremail : $owneremail;
    $queryownerp = empty($ownerphonenumber) ? $or_ownerphonenumber : $ownerphonenumber;
    $queryownera = empty($address) ? $or_address : $address;



    $query = "UPDATE owner_table SET ownername = '$queryownern', 
    owneremail = '$queryownere' , 
    ownerphonenumber = '$queryownerp' , 
    address = '$queryownera' 
    WHERE ownerid = $ownerid" ;
    pg_query($db, $query);
    $_SESSION['success'] = "success !!!";

    header('location:listowners.php ');

}

if (isset($_POST['editpatient'])){
    $ownerid = pg_escape_string($_POST['ownerid']);
    $patientid = pg_escape_string($_POST['patientid']);
    $petname = pg_escape_string($_POST['petname']);
    $species = pg_escape_string($_POST['species']);
    $breed = pg_escape_string($_POST['breed']);
    $birthday = pg_escape_string($_POST['birthday']);

    $or_petname = pg_escape_string($_POST['or_petname']);
    $or_species = pg_escape_string($_POST['or_species']);
    $or_breed = pg_escape_string($_POST['or_breed']);
    $or_birthday = pg_escape_string($_POST['or_birthday']);

    $querypatientn = empty($petname) ? $or_petname : $petname;
    $querypatients = empty($species) ? $or_species : $species;
    $querypatientbr = empty($breed) ? $or_breed : $breed;
    $querypatientbi = empty($birthday) ? $or_birthday : $birthday;



    $query = "UPDATE patient_table SET patientname = '$querypatientn', 
    species = '$querypatients' , 
    breed = '$querypatientbr' ,
    birthday = '$querypatientbi' 
    WHERE patientid = $patientid" ;
    pg_query($db, $query);
    $_SESSION['success'] = "success !!!";

    header('location:listowners.php ');

}