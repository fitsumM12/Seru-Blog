<?php
session_start();
include("includes/db.inc.php");
include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add Users</h4>
                    <p class="card-category">Complete User profile</p>
                </div>
                <div class="card-body">
                    <form action="adduser_control.php" method="post" name="form" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">User Name: </label>
                                    <input type="text" id="username" name="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Password:</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Contact:</label>
                                    <input type="text" name="contact" id="contact" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">User Role:</label>
                                    <input type="text" id="user_role" name="user_role" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Add
                            User</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>