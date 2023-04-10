<?php
session_start();
include("includes/db.inc.php");

include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="panel-body">
            <a>
                <?php  //success message
            if(isset($_POST['success'])) {
            $success = $_POST["success"];
            echo "<h1 style='color:#0C0'>Your Product was added successfully &nbsp;&nbsp;  <span class='glyphicon glyphicon-ok'></h1></span>";
            }
            ?></a>
        </div>
        <div class="col-md-14">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title"> Users List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Password</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>User Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $result = $conn->query("SELECT `user_id`, `username`, `password`, `contact`, `email`, `user_role` FROM `users` WHERE 1")or die ("query 1 incorrect.....");

                        while(list($user_id,$username,$password,$contact,$email,$user_role)=$result->fetch_array())
                        {	
                        echo "<tr><td>$user_id</td><td>$username</td><td>$password</td><td>$contact</td><td>$email</td><td>$user_role</td></tr>";
                        }
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
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title"> Categories List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ps">
                            <table class="table table-hover tablesorter " id="">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Path</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $result=$conn->query("select * from category")or die ("query 1 incorrect.....".$conn->error);
                                        $i=1;
                                        while(list($cat_id,$cat_title,$cat_path)=mysqli_fetch_array($result))
                                        {	
                                        echo "<tr><td>$cat_id</td><td>$cat_title</td><td>$cat_path</td>

                                        </tr>";
                                        }
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
</div>


</div>
</div>
<?php
include "footer.php";
?>