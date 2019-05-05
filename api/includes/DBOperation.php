<?php
class DbOperation {
    //Database connection link
    private $con;
    //Class constructor
    function __construct() {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';
        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();
        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }
    function signup($username, $password) {
        if ($this->isAlreadyExist($username)) {
            return false;
        }
        // query to insert record
        $query = "INSERT INTO
                    users
                SET
                    username=:username, password=:password";
    
        // prepare query
        $stmt = $this->con->prepare($query);
    
        // execute query
        if($stmt->execute(array(':username' => $username, ':password' => $password))) {
            return true;
        }
    
        return false;
    }

    function isAlreadyExist($username) {
        $query = "SELECT *
            FROM
                users 
            WHERE
                username=:username";
        // prepare query statement
        $stmt = $this->con->prepare($query);
        // execute query
        $stmt->execute(array(':username' => $username));
        if($stmt->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    function login($username, $password) {
        // select all query
        $query = "SELECT *
                FROM
                    users 
                WHERE
                    username=:username AND password=:password";
        // prepare query statement
        $stmt = $this->con->prepare($query);
        // execute query
        $stmt->execute(array(':username' => $username, ':password' => $password));
        
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return true;
        } else {
            return false;
        }
    }
}