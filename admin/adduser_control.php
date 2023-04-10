<?php
session_start();
include("includes/db.inc.php");
if(isset($_POST['btn_save']))
{
// SELECT `user_id`, `username`, `password`, `contact`, `email`, `user_role` FROM `users` WHERE 1
$username=$_POST['username'];
// $password=$_POST['password'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$user_role = $_POST['user_role'];
$password=hash("sha256",$_POST['password']);
$conn->query("insert into users(`username`,`password`,`contact`,`email`,`user_role`) values ('$username','$password','$contact','$email','$user_role')");
if(!$conn->errno){
    header("location: manageuser.php"); 
    $conn->close();
}else{
     die ("Query 1 is inncorrect........".$conn->error);
}
}

?>