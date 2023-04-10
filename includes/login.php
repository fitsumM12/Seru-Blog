<?php include "db.php";?>
<?php  session_start();  ?>
<?php
if (isset($_POST['submit'])) {
$email = $_POST['email'];
$password = $_POST['password'];

// ingestion-->to block the attacker
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

$query = "SELECT * FROM users WHERE email ='{$email}';";
if ($conn->query($query) && $row = $conn->query($query)->fetch_assoc()!=null) {
	while ($row = $conn->query($query)->fetch_assoc()){
		echo $db_username = $row['username'];
		echo $db_password = $row['password'];
		$db_contact = $row['contact'];
		$db_email= $row['email'];
		$db_user_role =$row['user_role'];
		if ($db_user_role == 'admin' &&  $password == $db_password ) {
			$_SESSION['username'] = $db_username;
			$_SESSION['contact'] = $db_contact;
			$_SESSION['user_role'] = $db_user_role;
			header("Location: ../admin");	
		}
		else{
			header("Location: ../index.php");
		}
	}
}
else{	
	header("Location: ../index.php");
}

// .......................................

}
?>