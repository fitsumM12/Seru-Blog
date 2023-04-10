<?php include "includes/db.php";?>
<?php include "includes/header.php";?>


<body>
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            
            <div class="col-md-12 col-lg-12" style="border:1px solid gray; box-shadow:4px 4px gray; border-radius:2px;">
            <?php
                if(isset($_GET['readmore'])){
                    $post_id =$_GET['readmore'];
                    $query = "SELECT * FROM posts where post_id = $post_id";
                    $all_post_from_database = $conn->query($query);
                    while($row = $all_post_from_database->fetch_assoc()){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <img class="img-responsive" style="width:100%; height:350px;" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p style="text-align:justify;"><?php echo $post_content; ?></p>

                
                    

                   <?php }}
                  ?>
               
            </div>


            <!-- Blog Sidebar Widgets Column -->

        </div>
        <!-- /.row -->

        <hr>

       <?php include "includes/footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
