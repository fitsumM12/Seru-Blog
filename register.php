<?php include "includes/db.php";?>
<?php include "includes/header.php";?>


<body>
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
  

  

    <div class="container">
        <div class="row" style="width:100%; height:100%">
        
        <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                       
        <h3 class="text-center text-info pt-5">Register</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                       
                       
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="contact" class="text-info">contact:</label><br>
                                <input type="number" name="contact" id="contact" class="form-control">
                            </div>
                            

                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group"><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="../index.php" class="text-info" style="float:left;">login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        <?php
if(isset($_POST['submit'])){
    $username =$_POST['username'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    /////////////////////////////////////////////////
    $email = mysqli_real_escape_string($conn,$email);
    $contact = mysqli_real_escape_string($conn,$contact);
    $password =mysqli_real_escape_string($conn,$password);
    $username =mysqli_real_escape_string($conn,$username);
    ////////////////////////////////////////////////////////
    $query = "SELECT * from users where email = '$email'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    ///////////////////////////////////////////////////////////     
    if(is_null($row)){
        $query = "INSERT INTO users(username, contact,email, password) VALUES('$username','$contact','$email','$password')";
        $result = mysqli_query($conn,$query);
        if(!$result){
            echo "not registered".mysqli_error($conn);
            }
        else{
            echo "Registered succesfully";
        }
    }
    /////////////////////////////////////////////////////////////////
     else{
        echo "existing account by this email";
     }   
    }
?>
        </div>

       <?php include "includes/footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
