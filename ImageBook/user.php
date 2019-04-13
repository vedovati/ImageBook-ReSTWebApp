<?php
class User {

    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $username;
    public $password;
 
    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }
    // signup user
    function signup(){

        // cHeck if username already exist in the database
        if ($this->isAlreadyExist()) {
            return false;
        }

        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username, password=:password";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // execute query
        if($stmt->execute(array(':username' => $this->username, ':password' => $this->password))) {
            return true;
        }
    
        return false;
    }
    // login user
    function login() {
        // select all query
        $query = "SELECT *
                FROM
                    " . $this->table_name . " 
                WHERE
                    username=:username AND password=:password";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute(array(':username' => $this->username, ':password' => $this->password));
        return $stmt;
    }

    function isAlreadyExist() {
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                username=:username";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute(array(':username' => $this->username));
        if($stmt->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
}