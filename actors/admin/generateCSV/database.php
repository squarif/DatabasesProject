<?php 
class Database {
	private $host = "localhost";
	private $user = "hammad";
	private $password = "Hammad@786";
	private $database = "Project";
  
  private $result = array();
	function runQuery($sql) {
		$conn = new mysqli($this->host,$this->user,$this->password,$this->database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $result = mysqli_query($conn, $sql);

    
    $conn->close();

    return $result;
    
	}
}
?>
