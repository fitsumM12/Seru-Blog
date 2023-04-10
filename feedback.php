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
                        <h3 class="text-center text-info pt-5">Feedback</h3>
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info"></h3>
                       
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="message" class="text-info">Message:</label><br>
                                <textarea name="message" id="" class="form-control"   rows="3" required></textarea>
                            </div>
                            <div class="form-group"><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['submit'])){
                                $email = $_POST['email'];
                                $message = $_POST['message'];
                                /////////////////////////////////////////////////
                                $email =mysqli_real_escape_string($conn,$email);
                                $message =mysqli_real_escape_string($conn,$message);
                                ///////////////////////////////////////////////////////////     
                                if($email && $message){
                                    $query = "INSERT INTO feedback(fb_email, message) VALUES('$email','$message')";
                                    $result = mysqli_query($conn,$query);
                                    if(!$result){
                                        echo "Not Accepted".mysqli_error($conn);
                                        
                                        }
                                    else{
                                        echo "<p style='color:green;font-style:italic;'>Accepted succesfully!<br>your feedback will worth. <br> Thank you for Your comment.<br></p>";
                                    }
                                }   
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
