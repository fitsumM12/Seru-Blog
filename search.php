
<?php include "includes/db.php";?>
<?php include "includes/header.php";?>


<body>
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">

             <?php

                if (isset($_POST['submit'])) {
                   $search= $_POST['search'];
                   $query = "SELECT * FROM posts where post_tags like '%$search%';";
                   if(!$conn->query($query)){
                    die("query failed".$conn->error);
                   }
                   
                   if (is_null($conn->query($query))) {
                     echo "NO RESULT";
                   }
                
                  else{
                    $query = "SELECT * FROM posts  where post_tags like '%$search%';";
                    $all_post_from_database = $conn->query($query);
                    while($row = $all_post_from_database->fetch_assoc()){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        ?>
                        <div class="col-md-4 col-sm-4" style=" box-shadow: 4px 4px gray; border-radius:5px;padding:8px;">
				<img class="img-responsive" style="height:300px; width:100%;image-style:cover;" src="images/<?php echo $post_image;?>" alt="">
				<hr>
				<a style=" padding:10px; float:center width:100%; border-radius:10px;" href="#"><?php echo $post_title; ?></a>
				<hr>
				<p><?php 
					$temp = explode(' ',$post_content,-1);
					$i = 0;
					while($i<10){
					    echo $temp[$i]." ";
					    $i++;
					}
					
					?></p>
				<a class="btn btn-success" href="post.php?readmore=<?php echo $post_id?> ">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
				<hr>
			</div>
                   <?php
                 }
                 }
                 }
              ?>               
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