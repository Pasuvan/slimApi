<?php
class DbConnect {
    private $conn;
    private $dbh;
    function connect() {
        include_once dirname(__FILE__) . '/Config.php';
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        return $this->conn;
    }
	
	function pdoconnect() {
		include_once dirname(__FILE__) . '/Config.php';		
		$this->dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL-PDO: " . mysqli_connect_error();
        }
        return  $this->dbh;	
	}
}
?>
