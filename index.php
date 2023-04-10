<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
<body>
	<!-- Navigation -->
	<?php include "includes/navigation.php"; ?>
	<!-- Page Content -->
	<!-- ///////////// -->
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="border:1px solid gray; box-shadow: 3px 0px 3px 0px gray; color:black;border-radius:10px; width:100%; padding:10px; margin:5px;">
				<h3 style="text-shadow:2px 2px gray;">Welcome to Seru Information Technology and Programming Language Site!</h3>
                <p>We are delighted to have you here. our site is not fully cunstructed yet.    for current service some related post are posted hereunder. you can access those post. for any comment or doubt, you can give in the <a style="background:black; color:white; border-radius:10px;" href="feedback.php">feedback</a> section </p>
			</div>
		</div>
		<div class="row">
			<!-- Blog Entries Column -->
			<?php
				$query = "SELECT * FROM posts;";
				$all_post_from_database = $conn->query($query);
				while($row = $all_post_from_database->fetch_assoc()){
				    $post_id = $row['post_id'];
				    $post_title = $row['post_title'];
				    $post_author = $row['post_author'];
				    $post_date = $row['post_date'];
				    $post_image = $row['post_image'];
				    $post_content = $row['post_content'];
				    
				
				?>
			<div class="col-md-6 col-lg-6 col-sm-12" style=" box-shadow: 4px 4px gray; border-radius:5px;padding:8px;">
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
					
					?>...</p>
				<a class="btn btn-success" href="post.php?readmore=<?php echo $post_id?> ">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
				<hr>
			</div>
			<?php }
				?>
			<!-- -->
		</div>
	   <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script>
		
		<?php include "includes/footer.php"; ?>
	</div>
	<!-- /.container -->
	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>