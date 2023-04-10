<?php
session_start();
include("includes/db.inc.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delet quer*/
mysqli_query($conn,"delete from users where user_id='$user_id'")or die("query is incorrect...");
}

include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="col-md-14">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Manage User</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table tablesorter table-hover" id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>User Password</th>
                                    <th>User Contact</th>
                                    <th>Email</th>
                                    <th>User Role</th>
                                    <th></th>
                                    <th><a href="adduser.php" class="btn btn-success">Add New</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $result = $conn->query("SELECT `user_id`, `username`, `password`, `contact`, `email`, `user_role` FROM `users` WHERE 1")or die ("query 1 incorrect.....");

                        while(list($user_id,$username,$password,$contact,$email,$user_role)=$result->fetch_array())
                        {	
                        echo "<tr>
                        <td>$user_id</td>
                        <td>$username</td>
                        <td>$password</td>
                        <td>$contact</td>
                        <td>$email</td>
                        <td>$user_role</td>
                        <td><a href='edituser.php?user_id=$user_id' type='button' rel='tooltip' title=''
                        class='btn btn-info btn-link btn-sm' data-original-title='Edit User'>
                        <i class='material-icons'>edit</i>
                        <div class='ripple-container'></div>
                    </a></td>
                    <td>
                    <a href='manageuser.php?user_id=$user_id&action=delete' type='button' rel='tooltip'
                        title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                        <i class='material-icons'>close</i>
                        <div class='ripple-container'></div>
                    </a>
                    </td>
                    </tr>";
                                }
                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
include "footer.php";
?>