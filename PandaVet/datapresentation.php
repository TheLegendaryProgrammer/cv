<?php

class dbObj
{
    /* csatlakozás az adatbázishoz*/
    var $servername = "localhost";
    var $username = "d44ijw";
    var $password = "d44ijw";
    var $dbname = "d44ijw";
    var $port = "5432";
    var $conn;
    function getConnstring()
    {
        $con = pg_connect("host=" . $this->servername . " port=" . $this->port . " dbname=" . $this->dbname . " user=" . $this->username . " password=" . $this->password . "") or die("Connection failed: " . pg_last_error());

        /* check connection */
        if (pg_last_error()) {
            printf("Connect failed: %s\n", pg_last_error());
            exit();
        } else {
            $this->conn = $con;
        }
        return $this->conn;
    }
}

class User
{
    protected $conn;
    protected $data = array();
    function __construct()
    {

        $db = new dbObj();
        $connString =  $db->getConnstring();
        $this->conn = $connString;
    }


    public function getUser()
    {
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM user_table where id ='$id';";
        $queryRecords = pg_query($this->conn, $sql) or die("problem, with getting the user");
        $cmdtuples = pg_affected_rows($queryRecords);
        $row = pg_fetch_assoc($queryRecords);
        return $row;
    }
}

class AllUser
{
    protected $conn;
    protected $data = array();
    function __construct()
    {

        $db = new dbObj();
        $connString =  $db->getConnstring();
        $this->conn = $connString;
    }

    public function getAllUser()
    {
        $sql = "SELECT * FROM user_table WHERE isadmin=2;";
        $queryRecords = pg_query($this->conn, $sql) or die("error, with getting users");
        $data = pg_fetch_all($queryRecords);
        return $data;
    }
}


class Owner
{
    protected $conn;
    protected $data = array();
    function __construct()
    {

        $db = new dbObj();
        $connString =  $db->getConnstring();
        $this->conn = $connString;
    }

    public function getOwner(int $ownerid)
    {
        $sql = "SELECT * FROM owner_table where ownerid =$ownerid;";
        $queryRecords = pg_query($this->conn, $sql) or die("error, with getting owner");
        $cmdtuples = pg_affected_rows($queryRecords);
        $row = pg_fetch_assoc($queryRecords);
        return $row;
    }

}
class AllOwner
{
    protected $conn;
    protected $data = array();
    function __construct()
    {

        $db = new dbObj();
        $connString =  $db->getConnstring();
        $this->conn = $connString;
    }
    public function getAllOwner()
    {
        $sql = "SELECT * FROM owner_table order by ownerid desc;";
        $queryRecords = pg_query($this->conn, $sql) or die("error, with getting owner");
        $data = pg_fetch_all($queryRecords);
        return $data;
    }
}

class Pet
{
    protected $conn;
    protected $data = array();
    function __construct()
    {

        $db = new dbObj();
        $connString =  $db->getConnstring();
        $this->conn = $connString;
    }

    public function getPet(int $patientid)
    {
        
        $sql = "SELECT * FROM patient_table WHERE patientid = $patientid;";
        $queryRecords = pg_query($this->conn, $sql) or die("error, with getting owner");
        $cmdtuples = pg_affected_rows($queryRecords);
        $row = pg_fetch_assoc($queryRecords);
        return $row;
    }
} 

class AllPet
{
    protected $conn;
    protected $data = array();
    function __construct()
    {

        $db = new dbObj();
        $connString =  $db->getConnstring();
        $this->conn = $connString;
    }

    public function getAllPetOfTheOwner(int $ownerid)
    {
       
        $sql = "SELECT * FROM patient_table WHERE ownerid = $ownerid;";
        $queryRecords = pg_query($this->conn, $sql) or die("error, with getting owner");
        $data = pg_fetch_all($queryRecords);
        return $data;
    }
}


class AllTreatment
{
    protected $conn;
    protected $data = array();
    function __construct()
    {

        $db = new dbObj();
        $connString =  $db->getConnstring();
        $this->conn = $connString;
    }

    public function getAllTreatment(int $patientid)
    {
        
        $sql = "SELECT * FROM treatment_table  where  patientid =$patientid;";
        $queryRecords = pg_query($this->conn, $sql) or die("error, with getting data");
        $data = pg_fetch_all($queryRecords);
        return $data;
    }
}

//statisztikák

class CountOwnersPatients
{
    protected $conn;
    protected $data = array();
    function __construct()
    {

        $db = new dbObj();
        $connString =  $db->getConnstring();
        $this->conn = $connString;
    }

    public function countOwnersPatients()
    {
        $sql = "SELECT ownername, COUNT(*) FROM owner_table ot 
        join patient_table pt on ot.ownerid = pt.ownerid 
        GROUP BY ownername 
        order by ownername asc;";
        $queryRecords = pg_query($this->conn, $sql) or die("error, with getting data");
        $data = pg_fetch_all($queryRecords);
        return $data;
    }

}

class CountPatientsTreatments
{
    protected $conn;
    protected $data = array();
    function __construct()
    {

        $db = new dbObj();
        $connString =  $db->getConnstring();
        $this->conn = $connString;
    }

    public function countPatientsTreatments()
    {
        $sql = "SELECT petname , COUNT(*) FROM patient_table pt 
        JOIN treatment_table tt on pt.patientid = tt.patientid 
        group by petname  order by petname  asc;";
        $queryRecords = pg_query($this->conn, $sql) or die("error, with getting data");
        $data = pg_fetch_all($queryRecords);
        return $data;
    }

}


class AllPatientWithDietTreatment
{
    protected $conn;
    protected $data = array();
    function __construct()
    {

        $db = new dbObj();
        $connString =  $db->getConnstring();
        $this->conn = $connString;
    }

    public function getAllPatientWithDietTreatment()
    {
        $sql = "SELECT petname, treatment FROM patient_table pt 
        JOIN treatment_table tt on pt.patientid = tt.patientid where treatment = 'Diet'; ";
        $queryRecords = pg_query($this->conn, $sql) or die("error, with getting data");
        $data = pg_fetch_all($queryRecords);
        return $data;
    }

}

class OwnersWhosHaveDogAndCat
{
    protected $conn;
    protected $data = array();
    function __construct()
    {

        $db = new dbObj();
        $connString =  $db->getConnstring();
        $this->conn = $connString;
    }

    public function getOwnersWhosHaveDogAndCat()
    {
        $sql = "SELECT distinct ownername FROM owner_table ot 
        join patient_table pt on ot.ownerid = pt.ownerid where pt.species='Dog' or pt.species='Cat';";
        $queryRecords = pg_query($this->conn, $sql) or die("error, with getting data");
        $data = pg_fetch_all($queryRecords);
        return $data;
    }

}
