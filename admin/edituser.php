<?php
session_start();
include("includes/db.inc.php");
$user_id=$_REQUEST['user_id'];
// query statement
$result = $conn->query("SELECT * FROM users WHERE user_id='$user_id'") or die("query is incorrect".$conn->error);
// data which is fetched
// SELECT `user_id`, `username`, `password`, `contact`, `email`, `user_role` FROM `users` WHERE 1
list($user_id,$username,$password,$contact,$email,$user_role)=$result->fetch_array();
if(isset($_POST['btn_save'])) 
{

$user_id=$_POST['user_id'];
$username=$_POST['username'];
$contact = $_POST['contact'];
$email=$_POST['email'];
$user_role = $_POST['user_role'];
$password=hash("sha256",$_POST['password']);

$query ="UPDATE `users` SET `username`='$username',`password`='$password',`contact`='$contact',`email`='$email',`user_role`='$user_role' WHERE `user_id`='$user_id'";
$conn->query($query);
if($conn->errno){
    echo"update failde";
}
else{
    header("location: manageuser.php");
    mysqli_close($con);
}
}
include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h5 class="title">Edit User</h5>
                </div>
                <form action="edituser.php" name="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">

                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" readonly />
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>User Name:</label>
                                <input type="text" id="username" name="username" class="form-control"
                                    value="<?php echo $username; ?>">
                            </div>
                        </div>
                        <!-- // SELECT `user_id`, `username`, `password`, `contact`, `email`, `user_role` FROM `users` WHERE -->

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="text" id="password" name="password" class="form-control"
                                    value="<?php echo $password; ?>">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contact:</label>
                                <input type="text" id="contact" name="contact" class="form-control"
                                    value="<?php echo $contact; ?>">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>User Role:</label>
                                <input type="text" name="user_role" id="user_role" class="form-control"
                                    value="<?php echo $user_role; ?>">
                            </div>
                        </div>




                    </div>
                    <div class="card-footer">
                        <button type="submit" id="btn_save" name="btn_save"
                            class="btn btn-fill btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
<?php
include "footer.php";
?>