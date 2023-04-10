<?php
class Connection{
    private $servername = "localhost";
    private $username = "root";
    private $password ="";
    private $dbname ="fitsum_cms";
   
    public function connect(){
        $conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        if($conn->errno){
            die("Connection failed: " . $con->error());
            
        }
        else{
            // echo "connected successfully";
            return $conn;
        }
    }
}
$obj = new Connection();
$conn = $obj->connect();
?>