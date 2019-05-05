<?php 
	//Class DbConnect
	class DbConnect {
		//Variable to store database link
		private $con;
	 
		//Class constructor
		function __construct(){
		}
	 
		//This method will connect to the database
		function connect() {
			//Including the constants.php file to get the database constants
            include_once dirname(__FILE__) . '/Constants.php';
            
            try {
                $this->con = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);

            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            return $this->con;
		}
	 
	}